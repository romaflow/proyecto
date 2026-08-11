# proyecto

CREA TU PROPIO FRAMEWORK PROFESIONAL MVC CON PHP POO MYSQL

# POO
Es un paradigma de programación, incluye la herencia, abstracción, polimorfismo y encapsulación. A principios de 1990.
* Clase, definiciones de propiedades.
* Objeto, instancia de una clase.
* Método, función asociada, conjunto de operaciones que se realizan a los datos que son asignados a un objeto.
* Atributo, propiedad de un objeto.
* Estado interno, variables privadas desde un método de una clase.

# Modelo - Vista - Controlador (MVC)
Es un patrón de diseño que separa el código en tres capas, estandariza el código, optimizarlo y legible.
* Modelo. Interactúa con la base de datos ().
* Vista. Información formateada, interactuar con el usuario.
* Controlador. Une la vista y el modelo, hará petición al modelo y actualizará la información de la vista.

# Bee framework
* Desarrollar en poo.
* Basado en el patron mvc.
* Debe contar con un archivo de configuración principal
* Debe contar con un archivo de configuración de la base de datos.
* Todas las peticiones serán tomadas dentro de index.php
* Clase para manejar vistas y renderizarlas.
* Clase para autocargar archivos y clases requeridas.
* Clase para redireccionar entre rutas.
* Archivo de funciones independientes.
* Clase para generar mensajes flash al usuario.
* Clase para generar un token csrf para seguridad.
* Debe contar con controlador y modelo principal.
* Clase para realizar la conexión a la base de datos.
* Clase para enviar correos de notificación.
* Clase principal bee para iniciar una instancia del sistema.