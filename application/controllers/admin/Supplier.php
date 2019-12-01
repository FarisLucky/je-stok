<?php
class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_supplier');
        $this->load->model('ModelApp');

        $this->load->library('form_validation');
    }
    // public function index()

    // {
    //     $data['title'] = 'Data Supplier';
    //     $data['sup'] = $this->M_supplier->getJoinJabatan();

    //     $this->load->view('backend/partials/navbar' ,$data);
    //     $this->load->view('backend/supplier/supplier', $data);
    //     $this->load->view('backend/partials/footer');
    // }
    public function index($num = 0)
    {
        $data['title'] = 'Data Supplier';
        $select = '*';
        $tbl = 'user';
        $order = 'id_user';
        $order_type = 'DESC';
        //Pagination control
        $per_page = 10;
        if ($num != 0) {
            $num = ($num - 1) * $per_page;
        }
        $data['supplier'] = $this->ModelApp->getData($select, $tbl, '', $order, $order_type, $per_page, $num)->result_array(); //get data user
        $data['row'] = $num;
        $this->pagination();
        $this->load->view('backend/supplier/supplier', $data);
    }

    private function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/produk/index/');
        $config['total_rows'] = $this->ModelApp->getData('id_produk', 'produk')->num_rows();
        $config['use_page_numbers'] = TRUE;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
    }
    public function add()
    {
        $data['title'] = 'Tambah Supplier';
        $data['role'] = $this->M_supplier->getRole()->result();
        
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('contact', 'contact','required|numeric|max_length[13]|min_length[10]');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
           $this->load->view('backend/partials/navbar' ,$data);
           $this->load->view('backend/supplier/supplier_tambah', $data);
           $this->load->view('backend/partials/footer');  
       } else {$this->aksiAdd(); }
   }

   public function aksiAdd()
   {
    $nama = $this->input->post('name',true);
    $username = $this->input->post('username',true);
    $email = $this->input->post('email',true);
    $password = $this->input->post('password',true);
    $contact = $this->input->post('contact',true);
    $id_role = $this->input->post('id_role', true);
    $data = array(
        'nama_lengkap' => $nama,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'id_role'=>$id_role,
        'telp' => $contact
    );

    $this->M_supplier->input_data($data, 'user');
    $this->session->set_flashdata('sukses', 'Ditambahkan !');
    redirect('admin/supplier');
}

public function ubah($id_user)
{
    $where = array('id_user' => $id_user);

    $data['title'] = 'Edit Supplier';
    $data['role'] = $this->M_supplier->getRole()->result();

    $data['supplier'] = $this->M_supplier->edit_data($where, 'user')->result();
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('contact', 'contact','required|numeric|max_length[13]|min_length[10]');
    $this->form_validation->set_rules('email', 'email', 'required');
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('backend/partials/navbar',$data);
        $this->load->view('backend/supplier/supplier_edit', $data);
        $this->load->view('backend/partials/footer');
    } else {
        $this->update();
    }
}

public function update()
{
  $nama = $this->input->post('name',true);
  $username = $this->input->post('username',true);
  $email = $this->input->post('email',true);
  $password = $this->input->post('password',true);
  $contact = $this->input->post('contact',true);
  $id = $this->input->post('id',true);
  $id_role=$this->input->post('id_role',true);

  $data = array(
    'nama_lengkap' => $nama,
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'id_role'=>$id_role,
    'telp' => $contact
);

  $where = array(

    'id_user' => $id_user,

);

  $this->M_supplier->update_data($where, $data, 'user');
  $this->session->set_flashdata('edit', 'Diubah !');

  redirect('admin/supplier');
}

function hapus($id_user)
{
    $where = array('id_user' => $id_user);
    $this->M_supplier->hapus_data($where, 'user');
    $this->session->set_flashdata('hapus', 'Dihapus !');
    redirect('admin/supplier');
}

    // public function store()

    // {
    //     // $config['upload_path']          = './uploads/';
    //     // $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //     // $config['max_size']             = 0;
    //     // $config['max_width']            = 0;
    //     // $config['max_height']           = 0;
    //     // $config['file_name'] = $_FILES['photo']['name'];

    //     // $this->load->library('upload', $config);
    //     // $this->upload->initialize($config);

    //     // if (!$this->upload->do_upload('photo')) //sesuai dengan name pada form 
    //     // {
    //     //     echo 'anda gagal upload';
    //     // } else {
    //         //tampung data dari form
    //         $nama = $this->input->post('name');
    //         $username = $this->input->post('username');
    //         $email = $this->input->post('email');
    //         $password = $this->input->post('password');
    //         $contact = $this->input->post('contact');
    //         $file = $this->upload->data();
    //         // $photo = $file['photo'];
    //         $data = array(
    //             'name' => $nama,
    //             'username' => $username,
    //             'email' => $email,
    //             'password' => $password,
    //             'contact' => $contact,
    //             'photo' => $photo,

    //         );
    //         $this->m_supplier->input_data($data, 'supplier');
    //         redirect('supplier');
    //     // }
    // }


}