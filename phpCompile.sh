#！/bin/bash
#1）获取相关组件
wget http://cn.php.net/distributions/php-5.4.0.tar.gz
wget http://ftp.gnu.org/pub/gnu/libiconv/libiconv-1.14.tar.gz
wget http://downloads.sourceforge.net/mcrypt/libmcrypt-2.5.8.tar.gz
wget http://downloads.sourceforge.net/mcrypt/mcrypt-2.6.8.tar.gz
wget http://downloads.sourceforge.net/mhash/mhash-0.9.9.9.tar.gz
wget ftp://ftp.imagemagick.org/pub/ImageMagick/ImageMagick-6.7.5-9.tar.gz
wget http://pecl.php.net/get/imagick-3.0.1.tgz
#2）安装相关插件
tar zxvf libiconv-1.14.tar.gz   &&  cd libiconv-1.14
./configure --prefix=/usr/local
make &&  make install &&   cd ..
tar zxvf libmcrypt-2.5.8.tar.gz && cd libmcrypt-2.5.8
./configure
make && make install
/sbin/ldconfig
cd libltdl/
./configure --enable-ltdl-install
make && make install &&  cd ../../
tar zxvf mhash-0.9.9.9.tar.gz && cd mhash-0.9.9.9/
./configure
make &&  make install && cd ..
ln -s /usr/local/lib/libmcrypt.la /usr/lib/libmcrypt.la
ln -s /usr/local/lib/libmcrypt.so /usr/lib/libmcrypt.so
ln -s /usr/local/lib/libmcrypt.so.4 /usr/lib/libmcrypt.so.4
ln -s /usr/local/lib/libmcrypt.so.4.4.8 /usr/lib/libmcrypt.so.4.4.8
ln -s /usr/local/lib/libmhash.a /usr/lib/libmhash.a
ln -s /usr/local/lib/libmhash.la /usr/lib/libmhash.la
ln -s /usr/local/lib/libmhash.so /usr/lib/libmhash.so
ln -s /usr/local/lib/libmhash.so.2 /usr/lib/libmhash.so.2
ln -s /usr/local/lib/libmhash.so.2.0.1 /usr/lib/libmhash.so.2.0.1
ln -s /usr/local/bin/libmcrypt-config /usr/bin/libmcrypt-config
tar zxvf mcrypt-2.6.8.tar.gz && cd mcrypt-2.6.8/
/sbin/ldconfig
./configure
make && make install  && cd ..
#3）安装依赖库
yum install ncurses-devel libxml2-devel bzip2-devel libcurl-devel curl-devel libjpeg-devel libpng-devel freetype-devel net-snmp-devel
tar xvzf php-5.4.0.tar.gz && cd php-5.4.0
./configure --prefix=/usr/local/php5.4.0 --with-config-file-path=/usr  --with-iconv-dir=/usr/local --enable-fpm --disable-phar --with-fpm-user=www-data --with-fpm-group=www-data --with-pcre-regex \--with-zlib --with-bz2 --enable-calendar --with-curl --enable-dba --with-libxml-dir --enable-ftp --with-gd --with-jpeg-dir --with-png-dir --with-zlib-dir --with-freetype-dir --enable-gd-native-ttf --enable-gd-jis-conv --with-mhash --enable-mbstring --with-mcrypt --enable-pcntl  --enable-xml --disable-rpath  --enable-shmop --enable-sockets --enable-zip --enable-bcmath --with-snmp --disable-ipv6  --with-apxs2=/usr/sbin/apxs
make ZEND_EXTRA_LIBS='-liconv'
make test
make install
#4）编译安装php扩展文件和配置文件
cp php.ini-production /usr/local/php5.4.0/etc/php.ini
vi /usr/local/php5.4.0/etc/php.ini
#5）修改配置文件
#在文件最后增加：
extension_dir = /usr/local/php5.4.0/lib/php/extensions/no-debug-non-zts-20090626/
extension = "memcache.so"
extension = "memcached.so"
extension = "imagick.so"
#修改文件中的各个参数为：
cgi.fix_pathinfo=0   #原来的值为 1
open_basedir = /tmp:/www/web   #原来被注释
expose_php = Off   #原来值为 On
allow_url_fopen = Off  #原来值为 On
disable_functions =phpinfo,passthru,ini_restore,eval  #原来值为空
#6）执行
echo "/usr/local/php/sbin/php-fpm start"  >>/etc/rc.local
#7）启动
service httpd start

