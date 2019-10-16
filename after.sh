#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# If you're not quite ready for Node 12.x
# Uncomment these lines to roll back to
# v11.x or v10.x

# Remove Node.js v12.x:
#sudo apt-get -y purge nodejs
#sudo rm -rf /usr/lib/node_modules/npm/lib
#sudo rm -rf //etc/apt/sources.list.d/nodesource.list

# Install Node.js v11.x
#curl -sL https://deb.nodesource.com/setup_11.x | sudo -E bash -
#sudo apt-get install -y nodejs

# Install Node.js v10.x
#curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
#sudo apt-get install -y nodejs

apt-get install -y libxpm4 libxrender1 libgtk2.0-0 libnss3 libgconf-2-4 chromium-browser xvfb gtk2-engines-pixbuf \
   xfonts-cyrillic xfonts-100dpi xfonts-75dpi xfonts-base xfonts-scalable imagemagick x11-apps xvfb

echo "[Unit]
Description=X Virtual Frame Buffer Service
After=network.target

[Service]
ExecStart=/usr/bin/Xvfb :99 -screen 0 1920x1080x24+32
User=vagrant

[Install]
WantedBy=multi-user.target" > /etc/systemd/system/Xvfb.service

chmod +x /etc/systemd/system/Xvfb.service
systemctl enable Xvfb.service
systemctl start Xvfb.service

buildDeps='wget' && \
  apt-get update -y && apt-get install -y \
  imagemagick \
  ipython \
  libjpeg-dev \
  python \
  python-dev \
  python-pil \
  python-numpy \
  python-scipy \
  python-matplotlib \
  python-pandas \
  python-pip \
  python-sympy \
  python-nose \
  xz-utils \
  $buildDeps \
  --no-install-recommends --force-yes && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
  python -m pip install --upgrade pip && \
  python -m pip install --upgrade setuptools && \
  python -m pip install pyssim && \
  wget https://johnvansickle.com/ffmpeg/releases/ffmpeg-release-amd64-static.tar.xz && \
  tar --strip-components 1 -C /usr/bin -xf ffmpeg-release-amd64-static.tar.xz --wildcards */ffmpeg */ffprobe && \
  rm ffmpeg-release-amd64-static.tar.xz && \
  apt-get purge -y --auto-remove $buildDeps
