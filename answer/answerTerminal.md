## Task1
```bash
pwd
ls -la
cd ~
ls
```
## Task2
```bash
mkdir my_website
cd my_website
mkdir css js images
touch index.html
cd css
touch style.css
```
## Task3
```bash
touch file1.txt file2.txt file3.txt
mkdir documents
mv *.txt documents
cd documents
cp file1.txt ..
```
## Task4
```bash
touch test1.tmp test2.txt test3.tmp
mkdir test
rm *.tmp
rmdir test
rm fake.txt 2> /dev/null
```
## Task5
```bash
head -n 10 /etc/passwd
tail -n 5 /var/log/syslog
wc -l /etc/passwd
cat -n /etc/passwd
```
