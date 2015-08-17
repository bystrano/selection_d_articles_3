
Sélections d'articles
=====================

Ce plugin permet de facilement mettre en place un système de sélections d'articles, comme par exemple les articles en Une sur la page d'accueil.

Après installation il ne fait rien, à vous choisir quelle(s) sélection(s) vous souhaitez définir sur le site.
Pour créer une sélection, il suffit d'insérer le formulaire `selection_d_articles` dans une page.
Par exemple, on peut insérer un formulaire permettant de définir une sélection "À la Une" dans la page d'accueil de l'espace privé en insérant le code suivant dans la page `prive/squelettes/contenu/accueil.html` :

```
#FORMULAIRE_SELECTION_D_ARTICLES{actus, À la Une}
```

Ce formulaire permettra d'éditer la sélection `actus`, et son titre sera "À la Une".
Comme tous les formulaires SPIP, on peut ajaxifier ce formulaire en le mettant dans une `div` avec la classe `ajax`.

On pourra alors afficher les articles de cette sélection sur la page d'accueil avec la boucle suivante :

```
<BOUCLE_actus(ARTICLES) {id_selection=actus} {par ordre}>
  [(REM) Le contenu des articles ici ]
</BOUCLE_actus>
```
