<?php
class blockContent extends Plugin
{

    public function adminController()
    {


        header('Content-Type: application/json');

        $tokenCSRF = $_POST['tokenCSRF']; // Retrieve CSRF token
        // Validate CSRF token if needed

        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = PATH_CONTENT . 'uploads/pages/' . $_POST['uuidfolder'] . '/';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755);
                file_put_contents($uploadDir . '.htaccess', 'Allow from all');
            };

            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $response = [
                    'success' => 1,
                    'file' => [
                        'url' => DOMAIN_BASE . $uploadFile
                    ]
                ];
            } else {
                $response = [
                    'success' => 0,
                    'file' => [
                        'url' => '',
                        'message' => 'Failed to move uploaded file'
                    ]
                ];
            }
        } else {
            $response = [
                'success' => 0,
                'file' => [
                    'url' => '',
                    'message' => 'File upload error'
                ]
            ];
        }

        echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function adminView()
    {
    }



    public function adminHead()
    {
        include($this->phpPath() . 'PHP/script.php');
    }




    public function adminBodyEnd()
    {


        echo '<script>
        const uploadurl = "/admin/plugin/blockcontent";
        </script>';



        include($this->phpPath() . 'PHP/footer.php');
    }
}
