<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['form_validation']);
		$this->load->model('Users_model');

	}


	public function index ()
    {

        if(isset($_SESSION['user'])){
            redirect(base_url('index.php/dashboard'));
        }

        if (isset($_POST['login_btn'])) {
            $email= $this->input->post('user_email');
            $pw= $this->input->post('user_password');

            $user_data=$this->Users_model->authenticate($email,$pw);

            if($user_data!==0){

                $user_info = [
                    'user_id'=>$user_data[0]->id,
                    'fullname'=>$user_data[0]->fullname,
                ];

                $this->session->set_userdata('user',$user_info);
                redirect('dashboard');

            }else{

                $this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
            }
    
        }

        $this->load->view('backend/page/login');
    }

    public function index2() {
        $this->load->model('Users_model');
        $data['residents'] = $this->Users_model->getResidents();
        $this->load->view('update_blotter', $data);
    }
    
    public function action()
    {
        // Process the form data
        $name = $this->input->post('name');
        $email = $this->input->post('email');
    
        // Perform necessary actions with the form data
    
        // Redirect or display a success message
    }
        public function register()
        {
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('repeatpass', 'Confirm Password', 'trim|required|matches[password]');
            $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
        
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('frontend/pages/register');
            }else {
                $admin_data = [
                    'firstname' => $this->input->post('firstname', TRUE),
                    'lastname' => $this->input->post('lastname', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'password' => $this->input->post('password', TRUE),
                    'repeatpass' => $this->input->post('repeatpass', TRUE),
                ];
        
            
                $insert = $this->db->insert('admin_table', $admin_data);
    
                if ($insert) {
                   /* echo $jsCode;*/
                    $this->load->view('frontend/pages/login');
                }
            }
        }


	public function dashboard()
	{
		if(!isset($_SESSION['user'])){
			$this->session->set_flashdata('msg_login', 'Please Login');
			redirect(base_url('index.php/admin'));
		}
		
		
	
        $this->load->model('Users_model');
        $data['residentCount'] = $this->Users_model->getResidentCount();
        $data['blotterCount'] = $this->Users_model->getBlotterCount();

        $this->load->view('backend/include/header');
		$this->load->view('backend/include/nav');
		$this->load->view('backend/page/dashboard', $data);
		$this->load->view('backend/include/footer');
 
    }
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('index.php/admin'));
	}

	
    public function add_resident(){
        
        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }

        $this->form_validation->set_rules('image','Image','validate_image_upload');
        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('purok','Purok','trim|required');
        $this->form_validation->set_rules('streetname','Street Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('sex','Sex','trim|required');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('birth_place','Birth Place','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('household_members','Total Household Members','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('land_ownership','Land Ownership Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('blood_type','Blood Type','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('disability','Differently-abled Person','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('occupation','Occupation','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('monthly_income','Monthly Income','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('education','Educational Attainment','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lightning_facilities','Lightning Facilities','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){

            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/add_resident');
            $this->load->view('backend/include/footer');

        }else{

            $config['upload_path'] = './uploads/'; // Specify the path where the image will be uploaded
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Allowed image file types
            $config['max_size'] = 2048; // Maximum file size in kilobytes (2MB)

            $this->load->library('upload', $config);

            
            if($_FILES['image']['name']==''){

                $this->session->set_flashdata('error','Please select an image');
    
                //  redirect(base_url('demo'));	
            }

            if(!$this->upload->do_upload('image')){
        
                $this->session->set_flashdata('error',$this->upload->display_errors());
     
                   //redirect(base_url('demo'));
             }
             else{

                $this->session->set_flashdata('success','Image successfully uploaded');

                $image_data = $this->upload->data();
               // $image_path = 'uploads/'. $image_data['file_name'];
              $image_path ='./uploads/'. $image_data['file_name'];

            $resident_data = [
                'image' => $image_path,
                'first_name'=>$this->input->post('firstname',TRUE),
                'middle_name'=>$this->input->post('middlename',TRUE),
                'last_name'=>$this->input->post('lastname',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'streetname'=>$this->input->post('streetname',TRUE),
                'barangay'=>$this->input->post('barangay',TRUE),
                'sex'=>$this->input->post('sex',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'birth_place'=>$this->input->post('birth_place',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
                'civil_status'=>$this->input->post('civil_status',TRUE),
                'religion'=>$this->input->post('religion',TRUE),
                'household_members'=>$this->input->post('household_members',TRUE),
                'land_ownership'=>$this->input->post('land_ownership',TRUE),
                'blood_type'=>$this->input->post('blood_type',TRUE),
                'disability'=>$this->input->post('disability',TRUE),
                'occupation'=>$this->input->post('occupation',TRUE),
                'monthly_income'=>$this->input->post('monthly_income',TRUE),
                'education'=>$this->input->post('education',TRUE),
                'lightning_facilities'=>$this->input->post('lightning_facilities',TRUE),
                
            ];

            $rbi_data = [
                    
                'first_name'=>$this->input->post('firstname',TRUE),
                'middle_name'=>$this->input->post('middlename',TRUE),
                'last_name'=>$this->input->post('lastname',TRUE),
                'extname'=>$this->input->post('extname',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'streetname'=>$this->input->post('streetname',TRUE),
               
                'sex'=>$this->input->post('sex',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'birth_place'=>$this->input->post('birth_place',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
                'civil_status'=>$this->input->post('civil_status',TRUE),
               
                'contact'=>$this->input->post('contact',TRUE),
                'occupation'=>$this->input->post('occupation',TRUE),
               

                
            ];

            $insert = $this->db->insert('resident',$resident_data);

            $insert_id = $this->db->insert_id();

            if( is_int($insert_id) ){
                redirect(base_url('index.php/dashboard/view-resident'));
            }

            redirect(base_url('index.php/dashboard/view-resident'));
        }
      }

    }
  


public function validate_image_upload()
{
  if (!empty($_FILES['image']['name'])) {
      return true;
  } else {
      $this->form_validation->set_message('validate_image_upload', 'Please select an image to upload.');
      return false;
  }
}


	public function view_resident(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $resident_list = $this->db->get('resident')->result();

        $data = ['resident_list'=>$resident_list];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/view_resident',$data);
        $this->load->view('backend/include/footer');
    }

  /*  public function delete($resident_id) {
        $this->load->model('Users_model');
        if ($this->Users_model->delete_user($resident_id)) {
            redirect(base_url('index.php/dashboard/view-resident')); // Redirect to user list page or any other page
        } else {
            echo 'Failed to delete the user.';
        }
    }*/

    public function delete_resident($resident_id){
        $this->db->db_debug = TRUE;
        $this->db->where('resident_id', $resident_id);
        $this->db->delete('resident');
        redirect(base_url('index.php/dashboard/view-resident'));
    }

  
    public function update_resident($resident_id) {
        if (!isset($_SESSION['user'])) {
            $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }
    
        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('purok','Purok','trim|required');
        $this->form_validation->set_rules('streetname','Street Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('sex','Sex','trim|required');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('birth_place','Birth Place','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('household_members','Household Members','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('land_ownership','Land Ownership Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('ownership_status','Household Ownership Status','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('blood_type','Blood Type','trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('disability','Differently-Abled','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('occupation','Occupation','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('monthly_income','Monthly Income','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('education','Educatonal Attainment','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lightning_facilities','Lightning Facilities','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">', '<p>');
    
        if ($this->form_validation->run() == FALSE) {
            // Load the resident data based on the resident_id
            $resident_data = $this->db->get_where('resident', array('resident_id' => $resident_id))->row();
    
            $data = [
                'resident_data' => $resident_data
            ];
            
    
            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/page/update_resident', $data);
            $this->load->view('backend/include/footer');
        } else {
            // Update the resident data
            $resident_data = [
                'first_name'=>$this->input->post('firstname',TRUE),
                'middle_name'=>$this->input->post('middlename',TRUE),
                'last_name'=>$this->input->post('lastname',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'streetname'=>$this->input->post('streetname',TRUE),
                'barangay'=>$this->input->post('barangay',TRUE),
                'sex'=>$this->input->post('sex',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'birth_place'=>$this->input->post('birth_place',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
                'civil_status'=>$this->input->post('civil_status',TRUE),
                'religion'=>$this->input->post('religion',TRUE),
                'household_members'=>$this->input->post('household_members',TRUE),
                'land_ownership'=>$this->input->post('land_ownership',TRUE),
                'ownership_status'=>$this->input->post('ownership_status',TRUE),
                'blood_type'=>$this->input->post('blood_type',TRUE),
                'disability'=>$this->input->post('disability',TRUE),
                'occupation'=>$this->input->post('occupation',TRUE),
                'monthly_income'=>$this->input->post('monthly_income',TRUE),
                'education'=>$this->input->post('education',TRUE),
                'lightning_facilities'=>$this->input->post('lightning_facilities',TRUE),
            ];
    
            $this->db->where('resident_id', $resident_id);
            $update = $this->db->update('resident', $resident_data);
    
            if ($update) {
                redirect(base_url('index.php/dashboard/view-resident'));
            }
        }

    }

    public function admin_user()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/page/admin_user');
        }else {
            $admin_data = [
                'firstname' => $this->input->post('firstname', TRUE),
                'lastname' => $this->input->post('lastname', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => $this->input->post('password', TRUE),
                'confirmpass' => $this->input->post('confirmpass', TRUE),
            ];
    
        /*    $jsCode = "
            <script>
                var confirmRegistration = confirm('Do you want to proceed with registration?');
                if (confirmRegistration) {
                    document.getElementById('registrationForm').submit();
                }else {
                    // handle cancellation or do nothing
              
                }
                </script>
                ";
*/
            $insert = $this->db->insert('admin_table', $admin_data);

            if ($insert) {
               /* echo $jsCode;*/
                $this->load->view('backend/page/admin_user');
            }
        }
    }

    
    
public function view_officials(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $officials_list = $this->db->get('official_table')->result();

    $data = ['officials_list'=>$officials_list];

    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/page/view_officials',$data);
    $this->load->view('backend/include/footer');
}
public function add_officials(){
    
    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('start_term','start term','trim|required');
    $this->form_validation->set_rules('end_term','end term','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if($this->form_validation->run()==FALSE){

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/add_officials');
        $this->load->view('backend/include/footer');

    }else{

        $officials_data = [
            'position'=>$this->input->post('position',TRUE),
            'name'=>$this->input->post('name',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'start_term'=>$this->input->post('start_term',TRUE),
            'end_term'=>$this->input->post('end_term',TRUE),
            
        ];


        $insert = $this->db->insert('official_table',$officials_data);

        $insert_id = $this->db->insert_id();

        if( is_int($insert_id) ){
            redirect(base_url('index.php/dashboard/view-officials'));
        }


    }
    


}

public function update_officials($id) {
    if (!isset($_SESSION['user'])) {
        $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }

    $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('start_term','start term','trim|required');
    $this->form_validation->set_rules('end_term','end term','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if ($this->form_validation->run() == FALSE) {
        // Load the resident data based on the resident_id
        $officials_data = $this->db->get_where('official_table', array('id' => $id))->row();

        $data = [
            'officials_data' => $officials_data
        ];
        

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/page/update_officials', $data);
        $this->load->view('backend/include/footer');
    } else {
        // Update the resident data
        $officials_data = [
            'position'=>$this->input->post('position',TRUE),
            'name'=>$this->input->post('name',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'start_term'=>$this->input->post('start_term',TRUE),
            'end_term'=>$this->input->post('end_term',TRUE),
    
        ];
        $this->db->where('id', $id);
        $update = $this->db->update('official_table', $officials_data);

        if ($update) {
            redirect(base_url('index.php/dashboard/view-officials'));
        }
    }

}
public function delete_officials($id){
    $this->db->db_debug = TRUE;
    $this->db->where('id', $id);
    $this->db->delete('official_table');
    redirect(base_url('index.php/dashboard/view-officials'));
}

/* AJAX  */
public function ajax_update_official_form(){

    $official_id = $this->input->post('official_id',true);

    $officials_data  =  $this->db->where('id',$official_id)->get('official_table')->row();
    
    $data = ['officials_data'=>$officials_data];

    $this->load->view('backend/page/popup/edit-official',$data);
}

public function view_blotter(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $blotter_list = $this->db->get('blotter')->result();

    $data = [
'blotter_list'=>$blotter_list
    ];

    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/page/view_blotter',$data);
    $this->load->view('backend/include/footer');
}

public function add_blotter(){
    if (!isset($_SESSION['user'])) {
    $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
    redirect(base_url('index.php/admin'));
}

$data['residents'] = $this->Users_model->getResidents(); // Fetch residents from the database
// Load your view and pass the data


$this->form_validation->set_rules('complainant', 'Complainant', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('age', 'Age', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('con_complainant', 'Contact # ', 'trim|required');
$this->form_validation->set_rules('complainee', 'Complainee', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('age_c', 'Age', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('address_c', 'Address', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('con_complainee', 'Contact #', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('complaint', 'Complaint', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('action', 'Action', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('location', 'Location of Incidence', 'trim|required|min_length[2]|max_length[50]');

$this->form_validation->set_error_delimiters('<p style="color:red;">', '<p>');

if ($this->form_validation->run() == FALSE) {
    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/page/add_blotter', $data);
    $this->load->view('backend/include/footer');
} else {
    $blotter_data = [
        'complainant' => $this->input->post('complainant', TRUE),
        'age' => $this->input->post('age', TRUE),
        'address' => $this->input->post('address', TRUE),
        'con_complainant' => $this->input->post('con_complainant', TRUE),
        'complainee' => $this->input->post('complainee', TRUE),
        'age_c' => $this->input->post('age_c', TRUE),
        'address_c' => $this->input->post('address_c', TRUE),
        'con_complainee' => $this->input->post('con_complainee', TRUE),
        'complaint' => $this->input->post('complaint', TRUE),
        'action' => $this->input->post('action', TRUE),
        'status' => $this->input->post('status', TRUE),
        'location' => $this->input->post('location', TRUE),
    ];

    $insert = $this->db->insert('blotter', $blotter_data);

    if ($insert) {
        $this->session->set_flashdata('success', 'Successfully Added!');
        redirect(base_url('index.php/dashboard/view-blotter'));
    } else {
        $this->session->set_flashdata('error', 'Added Failed!');
        // Handle the case when insertion fails
    }
}
}


public function update_blotter($blotter_id) {
    if (!isset($_SESSION['user'])) {
        $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }
// Validate the input if necessary

$this->form_validation->set_rules('complainant','Complainant','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('age','Age','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('address','Address','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('con_complainant','Contact # ','trim|required');
$this->form_validation->set_rules('complainee','Complainee','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('age_c','Age','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('address_c','Address','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('con_complainee','Contact #','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('complaint','Complaint','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('action','Action','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('status','Status','trim|required|min_length[2]|max_length[50]');
$this->form_validation->set_rules('location','Location of Incidence','trim|required|min_length[2]|max_length[50]');

$this->form_validation->set_error_delimiters('<p style="color:red;">', '<p>');

if ($this->form_validation->run() == FALSE) {
    
    $blotter_data = $this->db->get_where('blotter', array('blotter_id' => $blotter_id))->row();

    $data = [
        'blotter_data' => $blotter_data
    ];

    
    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/page/update_blotter',$data);
    $this->load->view('backend/include/footer');
} else {
    // Form validation passed, update the resident's information
    $blotter_data = [
        'complainant'=>$this->input->post('complainant',TRUE),
        'age'=>$this->input->post('age',TRUE),
        'address'=>$this->input->post('address',TRUE),
        'con_complainant'=>$this->input->post('con_complainant',TRUE),
        'complainee'=>$this->input->post('complainee',TRUE),
        'age_c'=>$this->input->post('age_c',TRUE),
        'address_c'=>$this->input->post('address_c',TRUE),
        'con_complainee'=>$this->input->post('con_complainee',TRUE),
        'complaint'=>$this->input->post('complaint',TRUE),
        'action'=>$this->input->post('action',TRUE),
        'status'=>$this->input->post('status',TRUE),
        'location'=>$this->input->post('location',TRUE),

    ];

    $this->db->where('blotter_id', $blotter_id);
    $update = $this->db->update('blotter', $blotter_data);

    if ($update) {
        redirect(base_url('index.php/dashboard/view-blotter'));
    }
}

}

/* AJAX  */
public function ajax_update_blotter_form(){
    $blotter_id = $this->input->post('blotter_id',true);
    $blotter_data  =  $this->db->where('blotter_id',$blotter_id)->get('blotter')->row();
    $data = ['blotter_data'=>$blotter_data];

    $this->load->view('backend/page/popup/edit-blotter',$data);
}

public function delete_blotter($id)
{
    $this->db->db_debug = TRUE;
    $this->db->where('blotter_id', $id);
    $this->db->delete('blotter');
    redirect('dashboard/view-blotter');
}
}