#!/bin/bash
# ---------------------------------------------------------------------------
# fly - Automatic package installation and configuration

# Copyright 2014,  <@WhiteDragon>
  
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License at <http://www.gnu.org/licenses/> for
# more details.

# Usage: fly [-h|--help] [-u|--user user] [-d|--distribution distribution]

# Revision history:
# 2014-05-17 Created by newscript ver. 3.3
# ---------------------------------------------------------------------------

PROGNAME=${0##*/}
VERSION="0.1"

clean_up() { # Perform pre-exit housekeeping
  return
}

error_exit() {
  echo -e "${PROGNAME}: ${1:-"Unknown Error"}" >&2
  clean_up
  exit 1
}

graceful_exit() {
  clean_up
  exit
}

signal_exit() { # Handle trapped signals
  case $1 in
    INT)
      error_exit "Program interrupted by user" ;;
    TERM)
      echo -e "\n$PROGNAME: Program terminated" >&2
      graceful_exit ;;
    *)
      error_exit "$PROGNAME: Terminating on unknown signal" ;;
  esac
}

usage() {
  echo -e "Usage: $PROGNAME [-h|--help] [-u|--user user] [-d|--distribution distribution]"
}

help_message() {
  cat <<- _EOF_
  $PROGNAME ver. $VERSION
  Automatic package installation and configuration

  $(usage)

  Options:
  -h, --help  Display this help message and exit.
  -u, --user user  User in which home directory userspesific programms should be installed
    Where 'user' is the User in which home directory userspesific programms should be installed.
  -d, --distribution distribution  Distribution for which the script should run
    Where 'distribution' is the Distribution for which the script should run.

  NOTE: You must be the superuser to run this script.

_EOF_
  return
}

# Trap signals
trap "signal_exit TERM" TERM HUP
trap "signal_exit INT"  INT

# Check for root UID
#if [[ $(id -u) != 0 ]]; then
#  error_exit "You must be the superuser to run this script."
#fi

# Parse command-line
while [[ -n $1 ]]; do
  case $1 in
    -h | --help)
      help_message; graceful_exit
      ;;
    -u | --user)
      echo "User in which home directory userspesific programms should be installed";
      shift;
      user="$1"
      ;;
    -d | --distribution)
      echo "Distribution for which the script should run";
      shift;
      distribution="$1"
      ;;
    -* | --*)
      usage
      error_exit "Unknown option $1"
      ;;
    *)
      echo "Argument $1 to process..."
      ;;
  esac
  shift
done


OS=$(lsb_release -si)
ARCH=$(uname -m | sed 's/x86_//;s/i[3-6]86/32/')
VER=$(lsb_release -sr)
# Main logic

[[PACKET_SCRIPTS]]

graceful_exit

