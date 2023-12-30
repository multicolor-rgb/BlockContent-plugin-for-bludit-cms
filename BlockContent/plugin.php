<?php
class blockContent extends Plugin
{

    public function adminController()
    {
        // Check if the form was sent
        if (isset($_POST['UPLOADEDITOR'])) {
            echo 'test';
            $uploadDir = PATH_CONTENT . 'BlockContentUpload';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755);
                file_put_contents($uploadDir . '/.htaccess', 'Allow from all');
            };

            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            $response = [];

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $response['success'] = true;
                $response['url'] = $uploadFile; // You might want to generate a unique filename
            } else {
                $response['success'] = false;
                $response['error']['message'] = 'Failed to upload image';
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    public function adminHead()
    {
        include($this->phpPath() . 'PHP/script.php');
    }

    public function adminBodyEnd()
    {
        include($this->phpPath() . 'PHP/footer.php');
    }
}
