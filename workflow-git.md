### WORKFLOW EN GRUPO CON GIT

1. Comprobar si hay cambios en el repositorio general:
    - git fetch

2. Sincronizar primero el repositorio general antes de tocar ningún fichero:
    - git pull origin main        (también sirve git rebase main)

3. Para hacer cambios en una tarea particular nos pasamos primero a esa rama. Con el siguiente comando pasamos a esa rama, y si no está creada la crea:
    - git checkout -b LP1-x           (donde x es el número de tarea donde trabajamos)

4. Traerme todo lo que tenga esa rama
    - git pull origin LP1-x        (también sirve git rebase LP1-x)

5. [SOLO SI HAY CONFLICTOS]. Solucionar posibles conflictos, se añaden los cambios y volvemos a sincronizar
    - Editar los ficheros afectados
    - git add .
    - git rebase --continue

6. Modificamos el código y comiteamos los cambios en esa rama
    - Editamos los ficheros donde vamos a programar
    - git add .
    - git commit -a -m "LP1-x mensaje indicando los cambios"

7. Subimos al repositorio cuando la funcionalidad esté terminada o alguien esté trabajando en la misma rama y necesite esos cambios pero en la rama donde hemos hecho los cambios (LP1-x)
    - git push origin LP1-x

8. Cuando toda la funcionalidad de la rama está acabada se solicita (al profesor) incorporar los cambios a la rama main haciendo una Pull Request:
    - Entras en la página de Github del repositorio
    - Cambias a la rama donde has hecho los cambios
    - Pulsas el botón Pull Request
    - Indicamos la rama base donde vamos a mezclar los cambios, y luego la rama (compare) donde hemos hecho los cambios.
    - Se le pone un título y una descripción detallada
    - Se marca como reviewer al profesor
    - Se pulsa el botón de crear
