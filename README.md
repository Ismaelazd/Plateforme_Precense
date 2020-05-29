<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Plateform de présences / Attendance platform (2 Contributors / 2 contributeurs)
## Langages / languages + Framework
- HTML
- CSS 
- SASS
- BOOTSTRAP
- JAVASCRIPT
- PHP
- LARAVEL 

## Outils / Tools
- VS Code
- Trello
- GitHub
- Discord

# Cahier des charges  / Specifications
### 1. Objectif du site /Purpose of the site
    - La plateforme a pour but de digitaliser notre système de prise de présence, que ce soit pour nos étudiants ou pour notre équipe. 
    / The purpose of the platform is to digitize our attendance system, both for our students and for our team.

### 2. Public cible / Target Audience
    - Etudiants / Students
    - Staff
### 3. Fonctionnement Global / Global Functionality
    - Tous les matins, les étudiants doivent se connecter et cliquer sur un bouton qui indiquera l'heure d’arrivée. Le système enregistre automatiquement l’heure de fin de cours fixée par le coach. Si l’étudiant arrive en retard ou part en avance, celui-ci doit le justifier en y indiquant le motif et en ajoutant une pièce justificative. Des statistiques regroupant les présences d’une personne ou d’un groupe de personnes sont également attendues.
     / Every morning, students must log in and click on a button that will indicate the time of arrival. The system automatically records the end time of the course set by the coach. If the student arrives late or leaves early, he must justify it by indicating the reason and adding a supporting document. Statistics on the. The presence of a person or group of persons is also expected.
### 4. Composition du site / Composition of the site
    - Menu
    - Section Slide avec titre et slogan(carrousel) / Slide section with title and slogan(carousel)
    - Section Présentation de l’école / Section Presentation of the school
        - Image
        - Texte / Text
    - Section Team
        - Image,nom,prénom,fonction / Image, last name, first name, function
        - Fonction membre principal / Function main member
    - Section Temoignages / Section Testimonials
    - Section Contact
        - Formulaire de contact / Contact Form
        - Une Map Google / A Google Map
        - Coordonnées de contact / Contact details
    - Newsletter
    - Inscription / Registration
    - Profil 
        - Page nécessitant d'être inscrit / Page requiring registration
        - Permet la modification des données personnelles / Allows modification of personal data
    - Roles
        - Visiteur / Visitor
        - Etudiant / Student
        - Professeur / Teacher
        - Admin (accepte les inscriptions,attribue le rôle) / Admin (accepts registrations, assigns role)
### 5. Fonctionnalités WebSite (Visiteur) / WebSite Features (Visitor)
    - Newsletter Event
    - Formulaire De Contact / Contact Form
    - Inscription / Registration

+ ### 5.1  Fonctionnalités (Membre) / Features (Member)
    - Gestion Profil
    - Gestion des présences
+ ### 5.2 Fonctionnalités (Back-Office) / Features (Back-Office)
    - Gestion des classes / Class management
    - Gestion des étudiants / Student Management
### 6. Système / System
    - Newsletter Event
        - Email requis / Email required
        - Accusé d’inscription dans la boîte mail du nouvel inscrit / Acknowledgement of registration in the mailbox of the new registrant
    - Formulaire De Contact / Contact Form
        - Nom,Prénom,Email,Objet,Texte / Last name,First name,Email,Subject,Text
        - Accusé de réception dans la boîte mail de l'émetteur avec copie du message / Acknowledgement in the sender's mailbox with a copy of the message
        - Chaque mail est envoyé à notre adresse email / Each email is sent to our email address
        - Chaque mail est visible dans le backoffice / Each mail is visible in the backoffice
    - Inscription / Registration
        - Données nécessaires pour une inscription / Data required for a registration
            - nom / name
            - prénom / first name
            - photo 
            - email
            - téléphone / phone
            - rue / street
            - commune / municipality
            - étude / study
        - Chaque inscription doit être validée par un Professeur / Each registration must be validated by a Teacher.
    - Profil Management Etudiant - Vue Étudiant / Student Management Profile - Student View
        - Modification des données, tout changement doit être validé par le professeur concerné de l’étudiant / Modification of the data, any change must be validated by the student's teacher concerned
    - Profil Management Etudiant - Vue Professeur / Student Management Profile - Teacher View
        - Modification des données profil / Changing profile data
        - Choix de la classe de l’étudiant / / Choice of the student's class
        - Vérification des statistiques avec filtre / Checking statistics with filter 
            - Choix de la date ( un jour en particulier ) / Choice of date (a specific day)
            - Choix d’un mois / Choice of one month
    - Profil Management Professeur /  Teacher Management Profile
        - Modification des données profil / Changing profile data
            - nom / name
            - prénom / first name
            - matière
            - email
            - mot de passe / password
            - photo
            - téléphone / phone
            - rue / street
            - commune / municipality
    - Présence / Attendance
        - C’est un bouton accessible dans l’administration de l’étudiant il sert à se mettre présent/absent il est accompagné de / It is a button accessible in the student's administration it is used to be present / absent it is accompanied with :
            - Upload de fichier (image) que l’étudiant peut laisser en cas de retard/absence / Upload file (image) that the student can leave in case of delay/absence
            - Note (texte) que l’étudiant peut laisser en cas de retard/absence / Note (text) that the student can leave in case of delay/absence
                - Si l’étudiant va s’absenter plusieurs jours il doit pouvoir choisir la date de départ et de fin de son absence. / If the student is going to be absent for several days, he or she must be able to choose the date of departure and end of his or her absence.
        - Classe / Class
            - Création\Modification\Suppression de classe / Creating\Changing\Deleting a class
            - Attribution d’un professeur pour une classe / Assigning a teacher for a class
    - Historique de présence / History of attendance
        - Membres / Members
            - Vue d’ensemble sur ses présences / Overview of his attendance
            - Taux de présence / Attendance rate
                - Présence / Presence
                - Présence avec retard / Presence with delay
                - Absences
                - Absences avec justificatif / Absences with justification
                - Absences injustifiées / Unjustified absences
                - Absences annoncées / Announced absences
        - Professeur / Teacher
            - Vue d’ensemble sur les présences des membres présent, il peut aussi voir individuellement les taux de chaque membre comme si il était connecté en tant que le membre /  Overview of present members's attendance, he can also see individually the rates of each member as if he were logged in as the member
    - Système de présence / Attendance system
        - On doit pouvoir se mettre présent et absent, laisser une note et/ou une image raccroché à son absence / we must be able to be present and absent, leave a note and/or a file hanging on to his absence
        - le professeur doit pouvoir choisir a quel heure commence une journée et a quel heure termine une journée, le système de présence termine automatiquement la journée d’un student qui était présent à l’heure de fin / the teacher must be able to choose at what time a day starts and ends, the attendance system automatically ends the day of a student who was present at the end time.
        - Si le student n’a pas prévenu de son absence, il est mis en absence injustifiée à la fin de la journée / If the student has not notified of his/her absence, he/she will be placed in unjustified absence at the end of the day.
        - Si le student préviens mais ne laisse pas de justificatif écrit ou d’image, il est absence annoncée / If the student informs but does not leave a written or pictorial proof of absence, the absence will be announced.
        - Si le student préviens qu’il est absent et a mis au moins un des deux il est absence justifiée / If the student warns that he is absent and has put at least one of the two it is a justified absence.
        - Si le student a été en retard ou est parti plus tôt -> Retard / If the student was late or left early -> Late
        - Si le student a été présent toute la journée, Présent / If the student has been present all day, Present
        - Le professeur doit pouvoir laisser un message aux student's sur la page de présence des étudiants / The teacher must be able to leave a message for the students on the student's presence page.