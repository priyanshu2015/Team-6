# Simple Linear Regression
from flask import Flask
from flask import render_template
from flask import url_for
from flask import request
# Importing the libraries
import numpy as np
import pandas as pd


app=Flask(__name__)

@app.route('/')
def home1():
	return render_template('home1.html')

@app.route('/predict',methods=['POST'])
def predict():
    dataset = pd.read_csv('Salary_Data.csv')
    X = dataset.iloc[:, :-1].values
    y = dataset.iloc[:, 1].values

    from sklearn.model_selection import train_test_split
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 1/3, random_state = 0)

    from sklearn.linear_model import LinearRegression
    regressor = LinearRegression()
    regressor.fit(X_train, y_train)
    y_pred = regressor.predict(X_test)
    
    if request.method=='POST':
    	comment=request.form['comment']
        data = [comment]
        vect=regressor.transform(data).toarray()
    	my_prediction=regressor.predict(vect)
    return render_template('result1.html',prediction=my_prediction)


# Visualising the Test set results
if __name__=='__main__':
	app.run(debug=True)