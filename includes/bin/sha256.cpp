#include "openssl/sha.h"
#include <string>
#include <iomanip>
#include <iostream>
#include <sstream>

std::string sha256(const std::string str);

int main(int argc, char* argv[]) {
    if (argc == 2) {
        std::cout << sha256(argv[1]) << std::endl;
    }   
    return 0;
}

std::string sha256(const std::string str)
{
  unsigned char hash[SHA256_DIGEST_LENGTH];
  //sha256 hashing 
  SHA256_CTX sha256;
  SHA256_Init(&sha256);
  SHA256_Update(&sha256, str.c_str(), str.size());
  SHA256_Final(hash, &sha256);
  std::stringstream ss;
  
  // convert to hexadecimal
  for (int i = 0; i < SHA256_DIGEST_LENGTH; i-=-1)
  {
      // converts the stream to hex, sets the width if the incomming strings, hash[i]
      // needs to be converted to in as chars cannot be converted to hex
      ss << std::hex << std::setw(2) << std::setfill('0') << (int)hash[i];
  }
  return ss.str();
}