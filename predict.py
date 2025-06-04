import pickle
import json
from flask import Flask, request

app = Flask(__name__)

# Load the trained model from the .pkl file
model_path = 'path/to/your/model.pkl'  # Update this path to your model
try:
    with open(model_path, 'rb') as file:
        model = pickle.load(file)
except Exception as e:
    print(f"Error loading model: {e}")

@app.route('/predict', methods=['POST'])
def predict():
    # Get JSON data from the request
    data = request.json
    
    # Ensure the required fields are present
    required_fields = ['Quantity_Sold', 'Price', 'Stock_Available', 
                       'Shelf_Life_days', 'Weather_Temperature_C', 
                       'Holiday', 'Region', 'Lead_Time_days']
    
    for field in required_fields:
        if field not in data:
            return json.dumps({'error': f'Missing field: {field}'}), 400

    # Prepare the features for prediction
    features = [
        data['Quantity_Sold'], 
        data['Price'], 
        data['Stock_Available'], 
        data['Shelf_Life_days'], 
        data['Weather_Temperature_C'], 
        int(data['Holiday']),  # Ensure Holiday is an int
        data['Region'],  # If Region needs to be encoded, do it here
        data['Lead_Time_days']
    ]
    
    # Make prediction
    try:
        prediction = model.predict([features])
    except Exception as e:
        return json.dumps({'error': str(e)}), 500

    # Return the prediction as JSON
    return json.dumps({'prediction': prediction.tolist()})

if __name__ == '__main__':
    app.run(debug=True)
