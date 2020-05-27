import tensorflow as tf
import os
import sys
import shutil
import numpy as np
import PIL.Image as pilimg

test_image = []
test_label = []
count = 0

new_model = tf.keras.models.load_model("./Controller/ML_result/my_model.h5")
new_model.summary()
path = "C:\Bitnami\wampstack-7.3.18-0\\apache2\htdocs\Controller/photos/auto/"
file = "auto_1590578085_1.png"
im = pilimg.open(path + file)

pix =  np.array(im)
pix = pix.flatten()

test_image.append(pix)
test_image = np.array(test_image)

test_image = test_image.reshape(test_image.shape[0],280,280,3)
prediction = new_model.predict(test_image)
print(prediction[0])
