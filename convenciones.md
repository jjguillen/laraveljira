## CONVENCIONES ESCRITURA NOMBRES Y VARIABLES

### MODELOS
- El nombre del modelo está en formato CamelCase: Categoria, en **singular**, en español.

### BASE DE DATOS
- La tabla de base de datos asociada al modelo es el nombre del modelo en **plural** en 
formato snake_case: categorias. Por ejemplo si tuvieras un modelo con un nombre como 
ProductType el nombre de la tabla de base de datos sería: product_types.
- La clave primaria es: id y será de tipo entero positivo y auto-incremental.
Además, añade a la tabla de la base de datos los campos created_at y updated_at automáticamente con $this->timestamps();
- El nombre del resto de los atributos de las tablas será el nombre en español sin acentos ni mayúsculas.
- El nombre de las foreign keys será lo que asume Eloquent, el nombre del modelo en snake_case más el sufijo _id, es decir, [nombre_modelo]_id 

### CONTROLADORES
- El nombre de los controladores será el nombre del modelo seguido de Controller, por ejemplo, CategoriaController. Idem para Seeders y Factorías.
- Podéis usar modelos con o sin resources. Si es sin resources se usará como variable para las rutas siempre {id}, de lo que corresponda. Si es con resources se usará el nombre del modelo en singular {categoria}

### VISTAS
- Habrá una vista con el estilo principal de todo llamada layout.blade.php hecha con Blade normal o con componentes.
- El resto de vistas estarán organizadas en carpetas: categoria, localizacion y producto. En cada carpeta tendremos las vistas:
    1. listado.blade.php: para mostrar todos los elementos
    2. nuevo.blade.php: para mostrar el formulario de creación
    3. detalle.blade.php: para mostrar el detalle de un elemento
- Cuando haya que pasar información a una vista la variable que se pase se llamará:
    1. id, cuando se pase un id, de lo que sea
    2. el modelo en plural (categorias), cuando se pase una colección de modelos
    3. mensaje, cuando queramos pasar un mensaje a imprimir en otra vista
    4. el resto os tenéis que poner de acuerdo


    