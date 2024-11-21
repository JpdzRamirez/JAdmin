from flask import Flask, request, jsonify
from flask_cors import CORS  # Importa CORS

import pandas as pd
import json

app = Flask(__name__)
CORS(app)

@app.route('/procesar_datos', methods=['POST'])
def procesar_datos():
    data = request.json  # Recibe los datos del formulario en formato JSON
    nombre = data.get('nombre')  # Obtiene el valor del campo 'nombre'
    email = data.get('email')  # Obtiene el valor del campo 'email'
    comentario = data.get('comentario')

    json_path = 'datos/opiniones.json'  # Cambia esta ruta al archivo JSON que quieras cargar
    with open(json_path, 'r') as f:
        data = json.load(f)

    df = pd.DataFrame(data)

    # Crear un nuevo registro y añadirlo al DataFrame
    nuevo_registro = {"nombre": nombre, "email": email, "comentario": comentario}
    df = df._append(nuevo_registro, ignore_index=True)

    # Guardar el DataFrame actualizado de vuelta en el archivo JSON
    df.to_json(json_path, orient='records', indent=4)


    # Procesa los datos (puedes hacer lo que necesites aquí)
    respuesta = f"Hola {nombre}, hemos recibido tu comentario."

    # Devuelve la respuesta en formato JSON
    return jsonify({'mensaje': respuesta})

if __name__ == '__main__':
    app.run(debug=True)