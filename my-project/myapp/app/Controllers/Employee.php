<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EmployeeModel;

class Employee extends ResourceController
{
    protected $modelName = 'App\Models\EmployeeModel';
    protected $format = 'json';
    public function index()
    {
        $model = model(EmployeeModel::class);
        return $this->respond($model->findAll());

    }

    public function show($id = null)
    {
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No employee found');
        }
    }

    // create
    public function create()
    {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Employee created successfully'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
       
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Employee updated successfully'
            ]
        ];

        return $this->respond($response);
    }

    // delete
    public function delete($id = null)
    {
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Employee successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No employee found');
        }
    }
}