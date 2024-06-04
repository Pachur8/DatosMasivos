import mysql.connector
import random
import string

# Configuración de la conexión a la base de datos
config = {
    'user': 'root',
    'password': 'localhost',
    'host': 'localhost',
    'database': 'big_data_db'  # Reemplaza con el nombre de tu base de datos
}

# Conexión a MariaDB
connection = mysql.connector.connect(**config)
cursor = connection.cursor()

# Funciones auxiliares para generar nombres
def generate_artist_name():
    prefix = "artista"
    random_letter = random.choice(string.ascii_letters)
    random_number = random.randint(1, 10)
    return f"{prefix} {random_letter}{random_number}"

def generate_obra_name():
    prefix = "Obra"
    random_letter = random.choice(string.ascii_letters)
    random_number = random.randint(1, 10)
    return f"{prefix} {random_letter}{random_number}"

# Crear entrada
def create_entry(id):
    name = generate_artist_name()
    titulo_obra = generate_obra_name()
    entry = {
        "id": id,
        "autor": name,
        "foto": name + '.jpg',
        "titulo": titulo_obra,
        "obra": titulo_obra + '.jpg'
    }
    return entry

# Función para realizar operaciones CRUD
def perform_crud_operations(num_cruds):
    id = 9
    for _ in range(num_cruds):
        print("CRUD: "+str(_))
        # CREATE operation.
        print("CREATE")
        entries = [create_entry(id + i) for i in range(55)]
        for entry in entries:
            cursor.execute("""
                INSERT INTO artistas2 (id, autor, foto, titulo, obra)
                VALUES (%s, %s, %s, %s, %s)
            """, (entry['id'], entry['autor'], entry['foto'], entry['titulo'], entry['obra']))
            print(f"{entry} creates")
        connection.commit()
        id += 55
        

        # READ operation.
        print("READ")
        for entry in entries:
            cursor.execute("SELECT * FROM artistas2 WHERE id = %s", (entry['id'],))
            cursor.fetchone()
            print(f"{entry} reads")

        # UPDATE operation.
        print("UPDATE")
        for entry in entries:
            new_obra = generate_obra_name()
            cursor.execute("""
                UPDATE artistas2
                SET titulo = %s, obra = %s
                WHERE id = %s
            """, (new_obra, new_obra + '.jpg', entry['id']))
            print(f"{entry} updates")
        connection.commit()
        
        # DELETE operation.
        print("DELETE")
        for entry in entries[:45]:
            cursor.execute("DELETE FROM artistas2 WHERE id = %s", (entry['id'],))
            print(f"{entry} deletes")
        connection.commit()
        print("-------------------------------------------")

# Realizar 1,000 operaciones CRUD (cada una con 50 acciones)
perform_crud_operations(1000)

# Cerrar conexión
cursor.close()
connection.close()
