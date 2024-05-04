<?php

    /**
     * @param $data
     * @return void
     */
    function response($data): void
    {
        echo json_encode($data);
    }