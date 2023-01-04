# CI-EMPLOYEE-REST-API

## Docker compose

**Warning**: This quick setup is only intended for development environments. You are encouraged to change the insecure default credentials and check out the available configuration options for the MariaDB container for a more secure deployment.

``` bash
docker-compose up
```

## Database

Create table `employees`:

``` sql
CREATE TABLE employees (
    id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    name varchar(100) NOT NULL COMMENT 'Name',
    email varchar(255) NOT NULL COMMENT 'Email Address',
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=1;
```
Populate table:

``` sql
INSERT INTO `employees` (`name`, `email`) VALUES
('John Doe', 'john@gmail.com'),
('Vanya Hargreeves', 'vanya@gmail.com'),
('Luther Hargreeves', 'luther@gmail.com'),
('Diego Hargreeves', 'diego@gmail.com'),
('Klaus Hargreeves', 'klaus@gmail.com'),
('Ben Hargreeves', 'ben@gmail.com'),
('The Handler', 'handler@gmail.com');
```