# -*- coding: utf-8 -*-



import json
import requests


url = 'http://127.0.0.1:8000/cv_prediction/'

input_data_for_model = {
    'req' : 'Azure,JavaScript,Zend,Codeigniter,Symfony,HTML5,PHP,OOP,CSS,SQL,MySQL',
    'cv' : 'Alice Clark CV.pdf,Alice Clark CV1.pdf',
    }

input_json = json.dumps(input_data_for_model)

response = requests.post(url, data=input_json)

print(response.text)

