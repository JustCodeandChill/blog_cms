<?php
session_start();
// This function base on the session variable errorMessage to determine the output
function errorMessage()
{
  if (isset($_SESSION['errorMessage'])) {
    $output = "<div class='alert alert-danger'>";
    $output .= htmlentities($_SESSION["errorMessage"]);
    $output .= "</div>";
    // null the errorMessage so it cant be appear in the next refresh page
    $_SESSION["errorMessage"] = null;
    return $output;
  }
}

function successMessage()
{
  if (isset($_SESSION['successMessage'])) {
    $output = "<div class='alert alert-success'>";
    $output .= htmlentities($_SESSION["successMessage"]);
    $output .= "</div>";
    $_SESSION["successMessage"] = null;
    return $output;
  }
}
