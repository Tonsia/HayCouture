# -*- coding: utf-8 -*-


from fastapi import FastAPI
from pydantic import BaseModel
from fastapi.middleware.cors import CORSMiddleware
import pickle
import json
import spacy
import pickle
import random
import re
import sys, fitz
import docx2txt
import nltk
nltk.download('punkt')



app = FastAPI()


origins = [

    "http://localhost",
    "http://localhost:8000",
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


class model_input(BaseModel):
    
    req : str
    cv : str
    # Glucose : int    

      

@app.post('/cv_prediction')
def cv_predd(input_parameters : model_input):
    
    input_data = input_parameters.json()
    input_dictionary = json.loads(input_data)
    
    req = input_dictionary['req']
    cv = input_dictionary['cv']
    result = analyzecv(req,cv)
    return result


def analyzecv(req,cvs):
    cvs1 = cvs.split(",")
    analyze_result = {}
    for cv in cvs1:
      percentage = findsimiliarity(req,cv)
      analyze_result.update({ cv : percentage})
    return dict(sorted(analyze_result.items(), key=lambda item: item[1],reverse=True)) #sort dict descending

def findsimiliarity(requirement,targetcv):
  print(targetcv)

  ### Targetcv document processing ###
  dir = 'C:/wamp64/www/haycouture/user/assets/uploaded_files/resume/'
  filename = dir+targetcv
  doc= fitz.open(filename)
  targetcvtext=""
  for page in doc:
      targetcvtext += page.get_text()

  nlp_model = spacy.blank('en')    
  ### Extracted Targetcv text processing with trained model ###
  doc = nlp_model(" ".join(targetcvtext.split('\n')))
  targetcvtrained=""
  for ent in doc.ents:
    targetcvtrained+=ent.text+" "
  
  ###requirement document processing###
  #reqtext=docx2txt.process(requirement)
  reqtext=requirement
  #print(reqtext)
  # Tokenize reqtext and store in sent_tokenized
  sent_tokenized = [sent for sent in nltk.sent_tokenize(reqtext)]

  # Word Tokenize first sentence from sent_tokenized, save as words_tokenized
  words_tokenized = [word for word in nltk.word_tokenize(sent_tokenized[0])]

  # Remove tokens that do not contain any letters from words_tokenized
  filtered = [word for word in words_tokenized if re.search('[a-zA-Z0-9]', word)]

  requiredskills=[]
  for i in range(len(filtered)):
      requiredskills.append(str(filtered[i]).upper())


  from spacy.matcher import PhraseMatcher

  nlp = spacy.blank('en')
  matcher = PhraseMatcher(nlp.vocab)

  # Run nlp.make_doc to create pattern for matching
  patterns = [nlp.make_doc(text) for text in requiredskills]
  matcher.add("SkillList", patterns)

  #inputing target cv text
  doc = nlp(targetcvtext.upper())
  matches = matcher(doc)

  candidateskills=[]
  for match_id, start, end in matches:
      span = doc[start:end]
      candidateskills.append(span.text)
      candidateskills = [*set(candidateskills)]

  print("Skills : ",candidateskills)
  print("Skills Required : ",patterns)
  skills = len(candidateskills)
  totalskills = len(patterns)
  percentage = skills/totalskills*100
  print("Percentage : ",percentage)
  print()
  return percentage
