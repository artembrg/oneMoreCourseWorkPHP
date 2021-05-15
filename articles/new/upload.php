<?php

$path = '../../static/images/';
if($_FILES['upload'])
{
    if (($_FILES['upload'] == 'none') or (empty($_FILES['upload']['name'])) )
    {
        $message = 'Файл не выбран';
    }
    else
        if ($_FILES['upload']['size'] == 0 or $_FILES['upload']['size'] > 2050000)
        {
            $message = 'Файл слишком большой';
        }
        else
            if (($_FILES['upload']['type'] != 'image/jpeg'))
            {
                $message = 'Допускается только загрузка jpg';
            }
            else
                if (!is_uploaded_file($_FILES['upload']['tmp_name']))
                {
                    $message = 'Непредвиденная ошибка';
                }
                else {
                    $name = $_FILES['upload']['name'];
                    move_uploaded_file($_FILES['upload']['tmp_name'], $path.$name);
                    $full_path = '../../static/images/'.$name;
                    $message = "Файл ".$_FILES['upload']['name']." загружен";
                }
    $callback = $_REQUEST['CKEditorFuncNum'];
    echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.$full_path.'", "'.$message.'" );</script>';
}