Utilisation de symfony :

installation :

avec l'installateur de symfony
installation dans le terminal (MAC) de l'installeur : curl -sS https://get.symfony.com/cli/installer | bash
installation de symfony (terminal de l'ide à la racine de votre projet) :  symfony new --full my_project

installation avec composer :

composer create-project symfony/website-skeleton my_project



une fois installer symfony installer (avec installateur ou non)
dans le terminal taper : composer require symfony/apache-pack (il permet de régler les problemes (si il y en a) lié à la tool bar de symfony qui permet de débuger)

connexion à la bdd :
puis dans le fichier .env dans la ligne 32 mettre le lien de connexion à la bdd (exemple : DATABASE_URL=mysql://root:root@localhost:8888/codflix?serverVersion=5.7)


toute création sur symfony sont basé sous cette commande php bin/console
les commandes make:                                                                                        
      make:auth                  Creates a Guard authenticator of different flavors                                            
      make:command               Creates a new console command class                                                           
      make:controller            Creates a new controller class                                                                
      make:crud                  Creates CRUD for Doctrine entity class                                                        
      make:entity                Creates or updates a Doctrine entity class, and optionally an API Platform resource           
      make:fixtures              Creates a new class to load Doctrine fixtures                                                 
      make:form                  Creates a new form class                                                                      
      make:functional-test       Creates a new functional test class                                                           
      make:message               Creates a new message and handler                                                             
      make:messenger-middleware  Creates a new messenger middleware                                                            
      make:registration-form     Creates a new registration form system                                                        
      make:reset-password        Create controller, entity, and repositories for use with symfonycasts/reset-password-bundle.  
      make:serializer:encoder    Creates a new serializer encoder class                                                        
      make:serializer:normalizer Creates a new serializer normalizer class                                                     
      make:subscriber            Creates a new event subscriber class                                                          
      make:twig-extension        Creates a new Twig extension class                                                            
      make:unit-test             Creates a new unit test class                                                                 
      make:validator             Creates a new validator and constraint class                                                  
      make:voter                 Creates a new security voter class                                                            
      make:user                  Creates a new security user class                                                             
      make:migration             Creates a new migration based on database changes.
               
création d'un utilisateur :

cela va permettre de créer un "User"
- adress mail
- identifiant unique au choix 
- hash de mot de passe

php bin/console make:user

dans le terminal des questions sont posé pour savoir ce que vous voulez

php bin/console make:auth
permet de créer un systeme de connexion et d'enregistrement se basant sur le make:user précédent
avec toutes les fonctionnalités de logout envoie de mail ect ect

php bin/console make:controller :
sert à créer un controlleur et une view
dans ce controlleur il y a une gestion de route ect ect

php bin/console make:entity

permet de créer des tables en base de donnée avec DOCTRINE
dans le terminal des questions sont posé pour savoir ce que vous voulez
int, bool, jointure (relation : manyToOne)

php bin/console make:migration permet de créer une migration (une sauvegarde et charger avant envoie dans base de donnée)
php bin/console doctrine:migration:migrate : permet de d'envoyez les fichier entity dans la base sql


