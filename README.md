# Programmation-Orientée-Objet

Bonjour à tous, bienvenue dans ce cours sur la Programmation Orientée Objet (POO) en PHP. 🖥️

Nous allons commencer par une révision des bases de la POO : les classes, les objets, l'héritage et l'encapsulation. 📚

Ensuite, nous approfondirons des concepts plus avancés tels que les espaces de noms, la composition, le typage, les fermetures, les traits, la gestion des erreurs, les interfaces et le polymorphisme. 🚀

Que vous soyez débutant ou expérimenté en PHP, ce cours vous aidera à maîtriser la POO et à améliorer vos compétences en développement. 💪

Prêts à commencer cette aventure ? C'est parti ! 🎯

## Cours
[Présentation Base POO](https://docs.google.com/presentation/d/1aHvNcMnkuOEjhDq_VJa3iE5J-dXO13AvNR7v5s1AJ2o/edit#slide=id.g7e09333cfd_0_287)

[Quizz Base POO](https://form.typeform.com/to/yZqXw2?typeform-source=idmkr.typeform.com)

[Présentation Classe Abstraite - traits - interfaces - Typage](https://docs.google.com/presentation/d/1pf-xzww9rOlcebCV6BWtPzjyEfFgMESUlp0USfX1zkw/edit#slide=id.p)

[Quizz Classe Abstraite - traits - interfaces - Typage](https://form.typeform.com/to/UlvJeR?typeform-source=idmkr.typeform.com)

## Livecodes
<details>
<summary><b>Livecode Soldat + Personnage</b></summary>
 
  ```php
        <?php
        // Contexte: On fait un jeu vidéo avec des personnages, soldats, docteurs etc. On va créer une classe abstraite Personnage et deux classes Docteur/Soldat qui hériteront de la classe Personnage.
        
        // ▹ Créons une classe abstraite Personnage ayant
        // - une propriété nom (qui sera initialisée dans le constructeur)
        // - méthode bonjour() qui affiche “bonjour je suis ${nom}”
        // - une méthode abstraite agir()
        
        // ▹ Tentons d’instancier Personnage, et regardez ce qu’il se passe. (Fatal error)
        
        // ▹ Créons une classe Soldat et une classe Docteur toutes deux vides, et qui
        // héritent de la classe Personnage. Vous devriez avoir un message d’erreur.
        
        abstract class Personnage {
            
            protected $nom;
            
            public function __construct ($nom){
                $this->nom = $nom;
            }
            
            // public function bonjour(){
            //     echo "bonjour je suis ". $this->nom ;
            // }
            abstract public function agir();
                
            
        }
        
        interface Salutation{
            public function bonjour();
            public function aurevoir();
        }
        
        class Soldat extends Personnage implements Salutation {
            public function agir(){
                echo "make peace";
            }
            public function bonjour(){
                 echo "bonjour je suis ". $this->nom ;
             }
            public function aurevoir(){
                 echo "au revoir ". $this->nom ;
             }
        }
        class Docteur extends Personnage implements Salutation {
            public function agir(){
                echo "save people";
            }
            public function bonjour(){
                 echo "Hello I'm ". $this->nom ;
            }
            public function aurevoir(){
                 echo "Good By ". $this->nom ;
            }
        }
        
        $soldat = new Soldat("Ryan");
        $docteur = new Docteur("House");
        
        $soldat->bonjour();
        $docteur->bonjour();
        $soldat->aurevoir();
        $docteur->aurevoir();
        $soldat->agir();
        $docteur->agir();
  ```
</details>


<details>
<summary><b>Livecode Animal + Chien</b></summary>
 
  ```php
    <?php
    
    interface AnimalInterface{
        public function eat();
    }
    
    trait walkable{
        public function walk(){
            echo 'walks';
        }
    }
    
    class Robot{
        use walkable;
    }
    
    
    abstract class Animal implements AnimalInterface{
    
        use walkable;
        
        public function breath(){
            //content
            //On considère que tous les animaux respirent pareil
        }
        
        abstract public function eat();
    
    }
    
    
    class Chien extends Animal implements AnimalInterface{
        public function eat(){
            echo 'je mange de la viande';
        }
    }
    
    class Mouton extends Animal implements AnimalInterface{
        public function eat(){
            echo 'Je mange de l\'herbe';
        }
    }
    
    class Requin extends Animal implements AnimalInterface{
        public function eat(){
            echo 'Je mange du poisson';
        }
    }
    
    
    
    $chien = new Chien();
    $chien->walk();
    
    $robot = new Robot();
    $robot->walk();
    
    function doSomething(AnimalInterface $animal){
        $animal->eat();
    }
    
    doSomething($chien);
  ```
</details>

<details>
<summary><b>Livecode Copie & Référence</b></summary>
 
  ```php
    <?php
    
    //Ici $b = $a entraine une copie de $a dans $b et l'allocation d'une nouvelle entrée mémoire
    $a = 1;
    $b = $a;
    $a = 2;
    print_r($a);
    print_r($b);
    
    //Ici $b = &$a entraine la copie de l'adresse de $a dans $b, et non de la création d'une nouvelle variable
    // La moficidation de $a entraine donc la modification de $b
    $a = 1;
    $b = &$a;
    $a = 2;
    print_r($a);
    print_r($b);
    
    ///////////////////////////////////////:
    
    $array = [
        1,
        2,
        3,
        4
    ];
    
    // Sans utiliser le passage par référence, chaque entrée de $array est copiée dans la variable $a
    // $a est une nouvelle valeur avec sa propre entrée mémoire, la modification de $a n'entraine pas la modification de $array
    
    foreach($array as $a){
        $a = $a + 1;
    }
    print_r($array);
    
    // Lorsque l'on utilise la notation &, ce n'est plus l'entrée du tableau qui est copiée mais son adresse.
    // Comme il s'agit finalement d'un nouvel alias vers l'entrée du tableau, la modification de $a entraine la modification de array
    foreach($array as &$a){
        $a = $a + 1;
    }
    print_r($array);
    
    ///////////////////////////////////////
    //Contrairement à un tableau, et autre type classique (int, bool, string ...), les objets sont toujours passés par référence dans une fonction
    
    $a = [
        1
    ];
    
    function test ($array){
        $array[0] = 2;
    }
    test($a);
    print_r($a);


    
    $a = new stdClass();
    $a->data = 1;
    
    function testObjet ($objet){
        $objet->data = 2;
    }
    testObjet($a);
    print_r($a);
    


  ```
</details>

## Exercices

### Closures
1. Faire afficher Hello Garage404 au code ci-dessus

 ```php 
 function createGreeter($who)
 {
     return function () use ($who) {
         echo "Hello $who";
     };
 }
 ```

2. Créer une fonction de map qui mette tous les éléments d'un tableau au carré
 
 ```php
 
 $fct = function ($a) {
 };
 
 function map($array, $callback)
 {
 }
 print_r(map([4, 5], $fct));
 ```

3. Créer une fonction qui fait la somme des éléments d'un tableau
 ```php

 $total = 0;
 /*
 * Ecrire la fonction :)
 */
 onEach([4, 5], $fct);
 print_r($total);

```
### TP 🍽️ Recettes aléatoires

Le client vous donne un fichier json contenant des recettes de cuisine.

#### Demande du client

Le client souhaite avoir un site qui affiche les recettes qui se trouvent dans le fichier json. À chaque fois que quelqu'un recharge la page, une recette aléatoire s'affiche. Si l'utilisateur a déjà réalisé cette recette, il peut l'indiquer et son retour est enregistré anonymement dans la base de données.

#### Page Recette

Sur cette page doivent être affichés :

- Le nom de la recette
- Les ingrédients
- Le temps de préparation
- Le temps de cuisson
- Le nombre de personnes

#### Page Retour

Sur cette page doit être affichée :

- Le nom de la recette
- Le commentaire de l'utilisateur
- Sa note sur 5

#### Instructions techniques
   - **Laravel**
     - Le fichier doit être parsé grâce à une ligne de commande `php artisan macommande`.
     - Utilisez des modèles pour communiquer avec la base de données.
     - Utilisez des répositories comme interfaces obligatoires entre la base de données, les modèles et le reste de la logique métier.
     - Les modèles ne doivent pas passer les repo. Ceux-ci ne doivent retourner que des array.
   - **Symfony**
     - Le fichier doit être parsé grâce à une commande Symfony `php bin/console app:parse-recipes`.
     - Utilisez des entités pour représenter les recettes et les retours des utilisateurs.
     - Utilisez des repositories comme interfaces obligatoires entre la base de données, les entités et le reste de la logique métier.
     - Les entités ne doivent pas passer les repositories. Ceux-ci ne doivent retourner que des array.
     
#### Bonnes pratiques

- Pensez bien vos classes en amont.
- Votre code doit être systématiquement re-factorisé.
- Le nom de vos variables importe.
- L'indentation de votre code est primordiale.
- Chaque méthode de chaque classe doit être commentée.

## Ressources

- [Dangers/Limites de l'héritage](https://www.amitmerchant.com/reasons-use-composition-over-inheritance-php/)
- [Naming classes, interfaces and namespaces](https://medium.com/@Claromentis/naming-classes-interfaces-and-namespaces-361c63474e6c)
- [Closures](https://www.php.net/manual/fr/class.closure.php)
  - [PHP Lambdas and Closures](https://medium.com/oceanize-geeks/php-lambdas-and-closures-bfca4d01bf18)
  - [Apprendre le PHP : Chapitre 35, Les fonctions anonymes](https://www.youtube.com/watch?v=xJLwegBM64k) 



## ⛑️ A connaitre PAR COEUR
### ⛑️ Principes de bases de la POO

 - Modularité
 - Encapsulation / Composition
 - Héritage
 - Polymorphisme

### ⛑️ Cas utilisation et syntaxe
 - Classes abstraites
 - Interfaces
 - Traits
 - Typage