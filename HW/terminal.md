## task1

```bash
pwd
ls -la
cd 
ls
```

## task2

```bash
mkdir my_website
cd my_website
mkdir css js images
touch index.html
touch css/style.css
```

## task3

```bash
touch file1.txt file2.txt file3.txt
mkdir documents
mv *.txt documents
cp documents/file1.txt .
```

## task4

```bash
touch file1.tmp file2.tmp file3.txt
mkdir papka
rm *.tmp
rmdir papka
rm test.txt 2>/dev/null || true
```

## task5

```bash
head -10 /etc/passwd
tail -5 /var/log/syslog
wc -l /etc/passwd
cat -n /etc/passwd
```

## task6

```bash
find /etc -name "*.conf" 2>/dev/null | head -5 
find ~ -size +1M 
find ~ -mtime -1 
find ~ -empty 
```