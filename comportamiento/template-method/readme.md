
Template Method se utiliza en situaciones donde un algoritmo involucra una serie de pasos, algunos de los cuales son constantes mientras que otros pueden cambiar según el contexto. 
Este patrón permite que los pasos invariables de un algoritmo se implementen en una clase base, mientras que los pasos variables se definen en clases derivadas.


----

Ejemplo: Procesador de textos
Imagina que estás creadno una aplicacion de minería de datos que analiza documentos. Los usuarios suben a la aplicación documentos en varios formatos (PDF, DOC, CSV) y ésta intenta extraer la información relevante de estos documentos en un formato uniforme 