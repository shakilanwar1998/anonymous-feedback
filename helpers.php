<?php

function view($view, $data = []) {
    require './resources/views/' . $view . '.php';
}