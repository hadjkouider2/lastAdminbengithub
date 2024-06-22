<?php

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'ecoin';

$connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
// if ($connect) echo "<h1  style='color:green'>Connected</h1>";
// else echo "<h1 style='color:red'>Not Connected</h1>";
