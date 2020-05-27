import tensorflow as tf
import os
import sys
import shutil
import numpy as np
import PIL.Image as pilimg

path = "C:/Bitnami/wampstack-7.3.18-0/apache2/htdocs/Controller/photos/"
class_list = os.listdir(path)
train_images = []
test_images = []
train_labels = []
test_labels = []

count = 0
for CLASS in class_list:
    file_name = os.listdir(path + CLASS + "/" + "train")
    for file in file_name:
        im = pilimg.open(path + CLASS + "/" + "train/" + file)
        pix =  np.array(im)
        pix = pix.flatten()
        train_images.append(pix)
        train_labels.append(count)
        data = (file,count)
    file_name = os.listdir(path + CLASS + "/" + "test")
    for file in file_name:
        im = pilimg.open(path + CLASS + "/" + "test/" + file)
        pix =  np.array(im)
        pix = pix.flatten()
        test_images.append(pix)
        test_labels.append(count)
    count += 1

test_images = np.array(test_images)
train_images = np.array(train_images)
test_labels = np.array(test_labels)
train_labels = np.array(train_labels)

train_images = train_images.reshape(train_images.shape[0],280,280,3)
test_images = test_images.reshape(test_images.shape[0],280,280,3)
#이미지 읽어와서 reshape 끝

# 픽셀 값을 0~1 사이로 정규화합니다.
train_images, test_images = train_images / 255.0, test_images / 255.0

model = tf.keras.models.Sequential()

#입력받은 txt 파일에서 값을 받아와 conv2d, maxpooling2d파일 실행하기
"""
f = fopen("C:/Bitnami/wampstack-7.3.17-0/apache2/htdocs/Controller/param.txt",'r')
lines = f.readlines()
for i in range(len(lines)):
    if i[0] == "Conv2D":
        model.add(tf.keras.layers.Conv2D(i[1], (i[2], i[2]), activation='relu', input_shape=(240, 240, 3)))
    else:
        model.add(tf.keras.layers.MaxPooling2D((i[1], i[1])))
"""
model.add(tf.keras.layers.Conv2D(32, (3, 3), activation='relu', input_shape=(280, 280, 3)))
model.add(tf.keras.layers.MaxPooling2D((2, 2)))
model.add(tf.keras.layers.Conv2D(64, (3, 3), activation='relu'))
model.add(tf.keras.layers.MaxPooling2D((2, 2)))
model.add(tf.keras.layers.Conv2D(64, (3, 3), activation='relu'))

model.summary()

model.add(tf.keras.layers.Flatten())
model.add(tf.keras.layers.Dense(64, activation='relu'))
model.add(tf.keras.layers.Dense(3, activation='softmax'))

model.summary()

model.compile(optimizer='adam',
              loss='sparse_categorical_crossentropy',
              metrics=['accuracy'])

model.fit(train_images, train_labels, epochs=20)

test_loss, test_acc = model.evaluate(test_images,  test_labels, verbose=2)
os.mkdir("C:\Bitnami\wampstack-7.3.18-0\\apache2\htdocs\Controller\ML_result")
model.save("C:\Bitnami\wampstack-7.3.18-0\\apache2\htdocs\Controller\ML_result\my_model.h5")
