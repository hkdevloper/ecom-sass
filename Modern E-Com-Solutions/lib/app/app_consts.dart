import 'dart:ui';

class AppColors {
  static const Color darkGrey = Color.fromRGBO(64, 64, 64, 1);
  static const Color lightGrey = Color.fromRGBO(176, 176, 176, 1);
  static const Color grey = Color.fromRGBO(97, 97, 97, 1);
  static const Color darkWhite = Color.fromRGBO(246, 246, 246, 1);
  static const kPrimaryColor = Color(0xFFD95284);
  static const kPrimaryLightColor = Color(0xFF2E2E2E);
}

const baseURL = 'https://crosamo.com/api';
const userURL = '$baseURL/user';
const serverError = 'Server Error';
const unauthorized = 'Unauthrorized';
const somethingWentWrong = 'Something Went Wrong, Try Again!';
const logoutURL = '$baseURL/logout';
