<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2016-03-19 12:42:57
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 6,
  ),
  'paquet' => 
  array (
    'prefixe' => 'mf_gestion_instruments',
    'nom' => 'Gestion des instruments de Music Fund ',
    'slogan' => '',
    'description' => '',
    'logo' => 
    array (
      0 => '',
    ),
    'version' => '1.0.0',
    'auteur' => 'Orlando',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'communication',
    'etat' => 'dev',
    'compatibilite' => '[3.1.1;3.1.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => 'on',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'autorisations',
      1 => 'fonctions',
      2 => 'options',
      3 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => 'on',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'Instruments',
      'nom_singulier' => 'Instrument',
      'genre' => 'masculin',
      'logo' => 
      array (
        0 => '',
        32 => '',
        24 => '',
        16 => '',
        12 => '',
      ),
      'logo_variantes' => '',
      'table' => 'spip_instruments',
      'cle_primaire' => 'id_instrument',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'instrument',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Titre',
          'champ' => 'titre',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'mf_id',
          'champ' => 'mf_id',
          'sql' => 'varchar(50) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Date création',
          'champ' => 'date_creation',
          'sql' => 'datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'obligatoire',
          ),
          'recherche' => '',
          'saisie' => 'date',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'Descriptif',
          'champ' => 'descriptif',
          'sql' => 'mediumtext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '5',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'Nombre',
          'champ' => 'nombre',
          'sql' => 'int(11) NOT NULL DEFAULT 1',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'titre',
      'rubriques' => 
      array (
        0 => 'plan',
      ),
      'champ_date' => 'date_creation',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Instruments',
        'titre_objet' => 'Instrument',
        'info_aucun_objet' => 'Aucun instrument',
        'info_1_objet' => 'Un instrument',
        'info_nb_objets' => '@nb@ instruments',
        'icone_creer_objet' => 'Créer un instrument',
        'icone_modifier_objet' => 'Modifier cet instrument',
        'titre_logo_objet' => 'Logo de cet instrument',
        'titre_langue_objet' => 'Langue de cet instrument',
        'texte_definir_comme_traduction_objet' => 'Cet instrument est une traduction de l\'instrument numéro :',
        'titre_objets_rubrique' => 'Instruments de la rubrique',
        'info_objets_auteur' => 'Les instruments de cet auteur',
        'retirer_lien_objet' => 'Retirer cet instrument',
        'retirer_tous_liens_objets' => 'Retirer tous les instruments',
        'ajouter_lien_objet' => 'Ajouter cet instrument',
        'texte_ajouter_objet' => 'Ajouter un instrument',
        'texte_creer_associer_objet' => 'Créer et associer un instrument',
        'texte_changer_statut_objet' => 'Cet instrument est :',
        'supprimer_objet' => 'Supprimer cet instrument',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de cet instrument ?',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'fichiers' => 
      array (
        'echafaudages' => 
        array (
          0 => 'prive/squelettes/contenu/objets.html',
          1 => 'prive/objets/infos/objet.html',
          2 => 'prive/squelettes/contenu/objet.html',
        ),
        'explicites' => 
        array (
          0 => 'action/supprimer_objet.php',
        ),
      ),
      'saisies' => 
      array (
        0 => 'objets',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => '',
          'contenu' => '',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
      ),
    ),
  ),
);