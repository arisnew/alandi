<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {
    private $activeSession; // store session

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->activeSession = $this->session->userdata('_USER_ID');
    }

    public function index() {
        redirect(site_url('view/home'));
    }

    function proses_upload()
    {
        $code = 0;
        $message = '';

        if ($this->activeSession != null) {
            $this->form_validation->set_rules('nama_field', 'Field', 'trim|required');  //untuk nama input file
            $this->form_validation->set_rules('model', 'Model', 'trim|required');
            $this->form_validation->set_rules('key', 'ID', 'trim|required');
            $this->form_validation->set_rules('value', 'Identifier', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $delimiter = '- ';
                $this->form_validation->set_error_delimiters($delimiter, '.<br>');
                $message = validation_errors();
                echo json_encode(array('error'=>$message));
            } else {
                //upload gambar...
                $config['upload_path'] = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '10000';  //kilo
                //$config['max_width']  = '1940';
                //$config['max_height']  = '900';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($this->input->post('nama_field')))
                {
                    $message = $this->upload->display_errors();
                    echo json_encode(array('error'=>$message));
                } else {
                    $result = $this->upload->data();
                    if($result !=''){
                        foreach ($result as $item => $value){
                            $image_filename = $result['file_name'];
                        }
                        //build query
                        $model = $this->input->post('model') . 'model';
                        $this->load->model($model);
                        $query = array(
                            'table' => $this->$model->getTable(),
                            'type' => $this->model->UPDATE, 
                            'data' => array('img' => $image_filename), 
                            'at' => array($this->input->post('key') => $this->input->post('value')) // clause for model
                        );
                        $result = $this->$model->action($query); // do...
                        if ($result) {
                            //hapus img lama jika perlu
                            //unlink(filename);
                            //$message = msgbox('ok', 'Data berhasil disimpan.');
                            echo json_encode(array());
                        } else {
                            $message = 'File gagal di upload.';
                            echo json_encode(array('error'=>$message));
                        }
                    }
                }
            }
        }
    }
}
/* End of file Uploader.php */
/* Location: ./application/controllers/Uploader.php */