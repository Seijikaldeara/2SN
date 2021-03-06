<?php

namespace Etna\SocialBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Photo;
use Etna\SocialBundle\Entity\Album;
use Symfony\Component\HttpFoundation\Response;
use Etna\SocialBundle\Form\Type\CreatePhotoFormType;

class PhotoController extends Controller {
    public function getPhotosAction($username, $albumname)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album_doctrine = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
//        $all_album = $album_doctrine->getAlbums();
//        $album = $all_album[0];
        $album = $album_doctrine->getAlbumFrom($albumname);
        $photos = $album->getPhotos();
        if (count($photos) == 0) {
            $nophoto = false;
            $allphoto = false;
        }
        foreach($photos as $photo)
        {
            $id_photo = $photo->getId();
            $info_photo['id'] = $photo->getId();
            $info_photo['nom'] = $photo->getNom();
            $info_photo['url'] = $photo->getUrl();
            $info_photo['commentaires'] = $photo->getCommentaires();
            $allphoto[$id_photo] = $info_photo;
            $info_photo = array();
            $nophoto = true;
        }
        return $this->render('EtnaSocialBundle:Photos:photos.html.twig', array(
            'username' => $username,
            'albumname' => $albumname,
            'id' => $id,
            'allphoto' => $allphoto,
            'nophoto' => $nophoto
        ));
    }

    public function addphotoAction($username, $albumname)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $user = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $photo = new Photo();
        $form = $this->createForm(new CreatePhotoFormType(), $photo);
        $form->setData($photo);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $photo->setUrl('/web/uploads/'.$username.'/'.$photo->file->getClientOriginalName());
                $photo->setDateCreation(new \DateTime('now'));
                $photo->setMembre($user);
                $photo->upload($username);

                $em->persist($photo);
                $albums = $user->getAlbums();
                $isset_default = false;
                foreach ($albums as $album)
                {
                    if ($album->getNom() == $albumname)
                    {
                        $album->addPhoto($photo);
                        $isset_default = true;
                    }
                }
                if ($isset_default === false)
                {
                    $new_album = new Album();
                    $new_album->setNom('Default');
                    $new_album->setDateCreation(new \DateTime('now'));
                    $new_album->setMembre($user);
                    $new_album->addPhoto($photo);
                    $user->addAlbum($new_album);
                }
                $user->addPhoto($photo);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('etna_social_get_photos',array('username'=> $username, 'albumname' => $albumname)));
        }
        return $this->render('EtnaSocialBundle:Photos:addphoto.html.twig', array(
            'username' => $username,
            'albumname' => $albumname,
            'form' => $form->createView()
        ));
    }

    public function displayPhotoAction($username, $albumname, $photoid)
    {
        $em = $this->getDoctrine()->getManager();
        $photo = $em->getRepository('EtnaSocialBundle:Photo')->find($photoid);
        $url = $photo->getUrl();
        $commentaires = $photo->getCommentaires();
        $allComments = array();
        $comment = array();
        $hasComment = false;
        foreach($commentaires as $commentaire)
        {
            $comment['id'] = $commentaire->getId();
            $comment['contenu'] = $commentaire->getContenu();
            $comment['date'] = $commentaire->getDateCreation();
            $comment['expediteur'] = $commentaire->getExpediteur();
            $allComments[$commentaire->getId()] = $comment;
            $comment = array();
            $hasComment = true;
        }

        return $this->render('EtnaSocialBundle:Photos:displayphoto.html.twig', array(
            'username' => $username,
            'albumname' => $albumname,
            'photoid' => $photoid,
            'url' => $url,
            'allComments' => $allComments,
            'hasComment' => $hasComment
        ));
    }

    public function removePhotoAction($username, $albumname, $photoid)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album = $user->getAlbumFrom($albumname);
        $album_id = $album->getId();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('EtnaSocialBundle:Membre')->find($id);
        $album = $em->getRepository('EtnaSocialBundle:Album')->find($album_id);
        $photo = $em->getRepository('EtnaSocialBundle:Photo')->find($photoid);
        $user->removePhoto($photo);
        $album->removePhoto($photo);
        $photo->setMembre(null);
        $em->flush();
        return $this->redirect($this->generateUrl('etna_social_get_photos',array(
            'username'=> $username, 'albumname' => $albumname, 'photoid' => $photoid
        )));
    }

    public function changeProfilePhotoAction($username)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $user = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $photo = new Photo();
        $form = $this->createForm(new CreatePhotoFormType(), $photo);
        $form->setData($photo);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $photo->setUrl('/web/uploads/'.$username.'/'.$photo->file->getClientOriginalName());
                $photo->setDateCreation(new \DateTime('now'));
                $photo->setMembre($user);
                $photo->upload($username);

                $em->persist($photo);
                $albums = $user->getAlbums();
                $isset_default = false;
                foreach ($albums as $album)
                {
                    if ($album->getNom() == 'Profile Pictures')
                    {
                        $album->addPhoto($photo);
                        $isset_default = true;
                    }
                }
                if ($isset_default === false)
                {
                    $new_album = new Album();
                    $new_album->setNom('Profile Pictures');
                    $new_album->setDateCreation(new \DateTime('now'));
                    $new_album->setMembre($user);
                    $new_album->addPhoto($photo);
                    $user->addAlbum($new_album);
                }
                $user->addPhoto($photo);
                $user->setUrlPhoto($photo->getUrl());
                $em->flush();
            }
            return $this->redirect($this->generateUrl('etna_social_profile',array('username'=> $username)));
        }
        return $this->render('EtnaSocialBundle:Photos:changephoto.html.twig', array(
            'username' => $username,
            'form' => $form->createView()
        ));
    }

    public function setProfilePhotoAction($username, $photoid)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        if (($album = $user->getAlbumFrom('Profile Pictures')) === false)
        {
            $em = $this->getDoctrine()->getManager();
            $album = new Album();
            $album->setNom('Profile Pictures');
            $album->setMembre($user);
            $album->setDateCreation(new \DateTime('now'));
            $em->persist($album);
            $user->addAlbum($album);
            $em->flush();
        }
        $album_id = $album->getId();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('EtnaSocialBundle:Membre')->find($id);
        $album = $em->getRepository('EtnaSocialBundle:Album')->find($album_id);
        $photo = $em->getRepository('EtnaSocialBundle:Photo')->find($photoid);
        $user->setUrlPhoto($photo->getUrl());
        $photo_already = false;
        $album_photos = $album->getPhotos();
        for ($i = 0; $i < count($album_photos); $i++) {
            if ($photo == $album_photos[$i]) {
                $photo_already = true;
            }
        }
        if ($photo_already == false)
        {
            $album->addPhoto($photo);
        }
        $photo->setMembre($user);
        $em->flush();
        return $this->redirect($this->generateUrl('etna_social_profile',array('username'=> $username)));
    }
}