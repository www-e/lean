<?php

class DashboardController
{
    public function index()
    {
        echo '<h1>Welcome to the Admin Dashboard!</h1>';
        echo '<p>You are successfully logged in.</p>';
        echo '<a href="/logout">Logout</a>';
    }
}