<?php
class animauxC extends Controller
{
    public function __construct()
    {
        $this->animauxModel = $this->model('animauxM');
    }



    public function afficherList()
    {
        $tab = $this->animauxModel->afficherAnimaux();
        $data = [
            'tab' => '',
            'email' => '',
            'userName' => '',
            'imageUser' => ''
        ];

        foreach ($tab as $key => $value) {

            $data['tab'] .=
                '   
                 <div class="affichagePics"  >
                 <img src="../public/Images/' . $value[7] . '" class="picStyle img-pop-up"  />
                 <a  class="tblRows textStyle" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . "-" . $value[5] . "-" . $value[6] . "-" . $value[7] . ' href="' . URLROOT . '/Pages/detailAnimal" data-label="Nom" >' . $value[1] . '</a> 
                 </div>
            
            ';
        }

        $email = $this->animauxModel->findEmailByID();
        foreach ($email as $key => $value) {
            $data['email'] .= '
            <h3  id="email"> ' . $value[0] . '</h3> 
            ';
        }

        //set username 
        $userName = $this->animauxModel->getUserByID();
        $data['userName'] .=  '<h3  id="userName"> ' .$userName[0][0].'</h3> ';
        
        //set image
        $imageUser = $this->animauxModel->getImageUserByID();
        $data['imageUser'] .=  '<h3  id="imageUser"> ' .$imageUser[0][0].'</h3> ';


        $this->view('animaux', $data);
    }

    public function SendEmail()
    {
        $data = ['email' => '', 'reclamation' => ''];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'email' =>  trim($_POST['email']),
            'reclamation' =>  trim($_POST['reclamation'])
        ];
        mail($data['email'], "Réclamation", "on va prendre votre réclamation en considération merci", "From: mhedhbi.meriamepb@gmail.com");

        $this->animauxModel->addReclamation($data);
        $this->view('detailAnimal', $data);
    }

    public function addComment()
    {

        $data = ['comment' => '', 'userName ' => '','animalID ' => '' ,'imageUser'=> ''];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'comment' =>  trim($_POST['comment']),
            'userName' =>   trim($_POST['userName']),
            'animalID' =>   trim($_POST['animalID']),
            'imageUser' =>   trim($_POST['imageUser'])
        ];
        $this->animauxModel->addCommentM($data);
        $this->view('detailAnimal', $data);
    }


    public function afficherComment()
    {
        $data = [
            'commentNumber' => '',
            'comment1' => ''

        ];
        $commentNumber = $this->animauxModel->getNbrComments($_POST['animalID1']);
        $data['commentNumber'] .= '
        <h4> ' . $commentNumber[0][0] . ' Comments </h4> 
        ';

        $comment = $this->animauxModel->afficherComment($_POST['animalID1']);
        foreach ($comment as $key => $value) {
            $data['comment1'] .=
                ' <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <img src="'.URLROOT.'/public/Images/'.$value[4].'"  >
            </div>
            <div class="desc">
            <p class="comment" style="font-size:20px;">' . $value[1] . '   </p> 
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5>
                            <a href="' . URLROOT . '/Pages/profile" style="font-size:15px;">' . $value[2] . ' </a>
                        <h5>
                    </div>
                </div>
            </div>
        </div>
    </div>  <br>';
        }
        $this->view('detailAnimal', $data);
    }
}
