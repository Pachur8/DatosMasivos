import pymysql
import pandas as pd

# Conexión a la base de datos
connection = pymysql.connect(
    host='localhost',
    user='root',
    password='localhost',
    database='big_data_db'
)

# Consulta SQL para seleccionar todos los datos de la tabla
sql_query = "SELECT * FROM artistas2"

# Ejecutar la consulta y leer los resultados en un DataFrame de pandas
df = pd.read_sql_query(sql_query, connection)

# Cerrar la conexión
connection.close()

# Escribir los datos en un archivo CSV
df.to_csv('datos.csv', index=False)
