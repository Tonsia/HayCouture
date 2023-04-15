import 'package:deliveryapp/users/authentication/login_screen.dart';
import 'package:deliveryapp/users/fragments/dashboard_of_fragments.dart';
import 'package:deliveryapp/users/userPreferences/user_preferences.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      title: 'Shop Now',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        // primarySwatch: Colors.blueGrey,
      ),
      home: FutureBuilder(
        future: RememberUserPrefs.readUserInfo(),
        builder: (context, dataSnapShot){
          if(dataSnapShot.data == null){
            return LoginScreen();
          }else{
            return DashboardOfFragments();
          }
        },
      ),
    );
  }
}

