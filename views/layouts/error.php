<div class="alert alert-danger">

<?php
    if (isset($_GET['e'])) {
        switch ($_GET['e']) {
            case '303':
                echo 'Error 303 : Access denied';
                break;
            case '500':
                echo 'Error 500 : Sorry, an internal problem has occurred';
                break;
            case '404':
                echo 'Error 404 : Page not found';
                break;
            case 'filenotfound':
                echo 'Error : The file does not exist';
                break;
            case 'foldernotfound':
                echo 'Error : The folder does not exist';
                break;
            default:
                echo 'Error : A problem has occured';
        }

    } else {
        echo 'Error : A problem has occured';
    }
?>

</div>
