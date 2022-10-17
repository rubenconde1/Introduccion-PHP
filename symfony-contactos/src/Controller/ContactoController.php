<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contacto;
use App\Entity\Provincia;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ContactoController extends AbstractController
{

    /**
     * @Route("/contacto/insertar",name="insertar_contacto")
     */


    public function insertar(ManagerRegistry $doctrine)
    {

        $entityManager = $doctrine->getManager();
        foreach ($this-> contactos as $c) {
            $contacto = new Contacto();
            $contacto->setNombre($c["nombre"]);
            $contacto->setTelefono($c["telefono"]);
            $contacto->setEmail($c["email"]);
            $entityManager->persist($contacto);
        }


        try{

            $entityManager->flush();
            return new Response("Contactos insertados");
        }catch (\Exception $e){
            return new Response("Error insertado objetos");
        }
    }

     /**
    *@Route("/contacto/{codigo}", name = "ficha_contacto")
    *
    */

    public function ficha(ManagerRegistry $doctrine, $codigo): Response{
        $repositorio = $doctrine->getRepository(Contacto::class);
        $contacto = $repositorio->find($codigo);

        return $this->render('ficha_contacto.html.twig', [
        'contacto' => $contacto
            
                ]);
    }


    private $contactos = [

        1 => ["nombre" => "Juan Pérez", "telefono" => "524142432", "email" => "juanp@ieselcaminas.org"],

        2 => ["nombre" => "Ana López", "telefono" => "58958448", "email" => "anita@ieselcaminas.org"],

        5 => ["nombre" => "Mario Montero", "telefono" => "5326824", "email" => "mario.mont@ieselcaminas.org"],

        7 => ["nombre" => "Laura Martínez", "telefono" => "42898966", "email" => "lm2000@ieselcaminas.org"],

        9 => ["nombre" => "Nora Jover", "telefono" => "54565859", "email" => "norajover@ieselcaminas.org"]

    ];    


     /**
    *@Route("/contacto/buscar/{texto}", name = "buscar_contacto")
    *
    */

    public function buscar(ManagerRegistry $doctrine, $texto): Response {
    
        $repositorio = $doctrine->getRepository(Contacto::class);
        $contactos = $repositorio->findByName($texto);

    return $this->render('lista_contactos.html.twing',['contactos' => $contactos]);
}

    public function update(ManagerRegistry $doctrine, $id, $nombre):Response{

        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Contacto::class);
        $contacto = $repositorio->find($id);
        if ($contacto) {
            $contacto->setNombre($nombre);
            try {
                $entityManager->flush();
                return $this->render('ficha_contacto.html.twig',['contacto' => $contacto]);

            } catch (\Exception $e) {
                return new Response ("Error insertado objetos");
            }
        }else
            return $this->render('ficha_contacto.html.twig',['contacto'=> null]);
    }

    public function delete(ManagerRegistry $doctrine, $id): Response{

        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine-> getRepository(Contact::class);
        $contacto = $repositorio->find($id);
        if ($contacto) {
            try {
                $entityManager->remove($contacto);
                $entityManager->flush();
                return new Response("Contacto Eliminado");

            } catch (\Exception $e) {
                return new Response ( "Error eliminado objeto");
            }
        }else
            return $this->render('ficha_contacto.html.twig',['contacto'=> null]);
    }

    /**
     * 
     * @Route("/contacto/insertarConProvincia", name="insertar_con_provincia_contacto")
     * 
     */
    public function insertarConProvincia(ManagerRegistry $doctrine): Response{

        $entityManager = $doctrine->getManager();
        $provincia = new Provincia();

        $provincia->setNombre("Alicante");
        $contacto = new Contacto();

        $contacto->setNombre("Inserción de prueba con provincia");
        $contacto->setTelefono("900220022");
        $contacto->setEmail("insercion.de.prueba.provincia@contacto.es");
        $contacto->setProvincia($provincia);

        $entityManager->persist($provincia);
        $entityManager->persist($contacto); 

        $entityManager->flush();
        return $this->render('ficha_contacto.html.twig', ['contacto'=>$contacto]);
    }

    public function insertarSinProvincia(ManagerRegistry $doctrine): Response{

        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Provincia::class);

        $provincia = $repositorio->findOneBy(["nombre" => "Alicante"]);

        $contacto = new Contacto();

        $contacto->setNombre("Inserción de prueba sin provincia");
        $contacto->setTelefono("900220022");
        $contacto->setEmail("insercion.de.prueba.provincia@contacto.es");
        $contacto->setProvincia($provincia);

        $entityManager->persist($contacto);

        $entityManager->flush();
        return $this->render('ficha_contacto.html.twig', ['contacto'=>$contacto]);
    }

    /**
     * 
     * @Route("/contacto/nuevo", name="nuevo_contacto")
     * 
     */

     public function nuevo(ManagerRegistry $doctrine, Request $request){

        $contacto = new Contacto();

        $formulario = $this->createFormbuilder($contacto)
            ->add('nombre',TextType::class)
            ->add('telefono',TextType::class)
            ->add('email',TextType::class)
            ->add('save',EmailType::class, array('label' => 'Correo electronico'))
            ->add('provincia',EntityType::class, array(
                'class' => Provincia::class,
                'choice_label' => 'nombre',
            ))
            ->add('save', SubmitType::class, array('label' => 'Enviar'))

            ->getForm();
            $formulario->handleRequest($request);

            if($formulario->isSubmitted()&& $formulario->isValid()){
                $contacto = $formulario->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($contacto);
                
            }

        return $this->render('nuevo.html.twig', array('formulario' => $formulario->createView()));


     }
}

