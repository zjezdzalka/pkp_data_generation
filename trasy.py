import random
file = open("trasy2.txt", "a", encoding="utf8");
with open("trasy2.txt", "a", encoding="utf8") as file, open("trasy.txt", encoding="utf8") as file3:
    for line in file3:
        line = line.strip()  # remove trailing newline
        line += "," + str(random.randint(2, 19)) + "." + str(random.randint(1,99)) + "\n"
        file.write(line)        #file.write(i + "," + str(random.randint(2, 19)) + "." + str(random.randint(1,99)) + "\n");


    