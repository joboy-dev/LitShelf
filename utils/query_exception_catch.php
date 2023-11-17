<?php
    function queryExceptionCatch(callable $function) {
        if (is_callable($function)) {
            try {
                return $function();
            } catch (mysqli_sql_exception $sql_exception) {
                $_SESSION['error'] = $sql_exception->getMessage();
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
    }
?>