<?php
class planteC extends Controller
{
    public function __construct()
    {
        $this->planteModel = $this->model('planteM');
    }



    public function afficherList()
    {
        $tab = $this->planteModel->afficherplante();
        $data = [
            'tab' => '',
        ];

        foreach ($tab as $key => $value) {
            
            $data['tab'] .= 
             '   
                 <div class="affichagePics"  >
                 <img src="../public/Images/' . $value[6] . '" class="picStyle img-pop-up"  />
                 <a  class="tblRows textStyle" data=' . $value[0] . "-" . $value[1] . "-" . $value[2] . "-" . $value[3] . "-" . $value[4] . "-" . $value[5] . "-" . $value[6] . "-" . $value[7] . ' href="'.URLROOT.'/Pages/detailplante" data-label="nomP" >' . $value[1] . '</a> 
                 </div>
            
            ';
            

        }



        $this->view('plante', $data);
    }



    /*public function likeDislike()
    {
        if(isset($_GET['t'],$_GET['idP']) AND !empty($_GET['t']) AND !empty($_GET['idP'])) {
            $getid = (int) $_GET['id'];
            $gett = (int) $_GET['t'];
            $sessionid = 5;
            $check = prepare('SELECT idP FROM plante WHERE idP = ?');
            $check->execute(array($getid));
            if($check->rowCount() == 1) {
               if($gett == 1) {
                  $check_like = prepare('SELECT id FROM likes WHERE id_plante= ? AND id_membre = ?');
                  $check_like->execute(array($getid,$sessionid));
                  $del = prepare('DELETE FROM dislikes WHERE id_plante= ? AND id_membre = ?');
                  $del->execute(array($getid,$sessionid));
                  if($check_like->rowCount() == 1) {
                     $del = prepare('DELETE FROM likes WHERE id_plante= ? AND id_membre = ?');
                     $del->execute(array($getid,$sessionid));
                  } else {
                     $ins = prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
                     $ins->execute(array($getid, $sessionid));
                  }
                  
               } elseif($gett == 2) {
                  $check_like = prepare('SELECT id FROM dislikes WHERE id_plante= ? AND id_membre = ?');
                  $check_like->execute(array($getid,$sessionid));
                  $del = prepare('DELETE FROM likes WHERE id_plante= ? AND id_membre = ?');
                  $del->execute(array($getid,$sessionid));
                  if($check_like->rowCount() == 1) {
                     $del = prepare('DELETE FROM dislikes WHERE id_plante= ? AND id_membre = ?');
                     $del->execute(array($getid,$sessionid));
                  } else {
                     $ins = prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
                     $ins->execute(array($getid, $sessionid));
                  }
               }
               header('Location: http://localhost/ZooPro-frontPlante/?idP='.$getid);
            } else {
               exit('Erreur fatale. <a href="http://localhost/ZooPro-frontPlante/planteC/afficherList">Revenir à l\'accueil</a>');
            }
         } else {
            exit('Erreur fatale. <a href="http://localhost/ZooPro-frontPlante/planteC/afficherList">Revenir à l\'accueil</a>');
         }


<a href="/planteC/likeDislike?t=1&idP=<?= $idP ?>">J'aime</a> (6)
                            <br />
                           <a href="/planteC/likeDislike?t=2&idP=<?= $idP ?>">Je n'aime pas</a> (1)


    }*/
}
