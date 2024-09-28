import React, { useContext }  from "react";
import { Text,View,Button } from "react-native";
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

import  LoginScreen  from '../screens/LoginPage';
import  HomeScreen  from '../screens/HomeScreen';
import { AuthContext } from "../context/AuthContext";
import FeedbackScreen from "../screens/FeedbackScreen";
import ComplainScreen from "../screens/ComplainScreen";
import ManageFeedbackScreen from "../screens/ManageFeedbackScreen";
import RegisterScreen from "../screens/RegisterScreen";
import CandidatesScreen from "../screens/CandidatesScreen";
import PositionScreen from "../screens/PositionScreen";
import ElectionScreen from "../screens/ElectionScreen";
import ResultScreen from "../screens/ResultsScreen";

const Stack = createNativeStackNavigator();


const Navigation = () => {
    
    const {userInfo,logout} = useContext(AuthContext);
    //console.log(userInfo.data);
    const TOKENS = userInfo.TOKEN;
    return (
        <NavigationContainer>
            <Stack.Navigator>
                {TOKENS ? (
                     <>
                     <Stack.Screen 
                   name="Home" 
                   component={HomeScreen}
                   options={{
                    headerRight: () => (
                      <Button
                        onPress={logout}
                        title="Logout"
                        color="#000"
                      />
                    ),
                  }} 
                  />
                  <Stack.Screen 
                  name="elections" 
                  component={ElectionScreen} 
                  options={{
                   headerTitle:'Elections',
                   headerRight: () => (
                     <Button
                       onPress={logout}
                       title="Logout"
                       color="#000"
                     />
                   ),
                 }} 
                   />
                  <Stack.Screen 
                  name="positions" 
                  component={PositionScreen} 
                  options={{
                   headerTitle:'Positions',
                   headerRight: () => (
                     <Button
                       onPress={logout}
                       title="Logout"
                       color="#000"
                     />
                   ),
                 }} 
                   />
                  <Stack.Screen 
                  name="candidates" 
                  component={CandidatesScreen} 
                  options={{
                   headerTitle:'Candidates',
                   headerRight: () => (
                     <Button
                       onPress={logout}
                       title="Logout"
                       color="#000"
                     />
                   ),
                 }} 
                   />
                   <Stack.Screen 
                   name="feedbacks" 
                   component={FeedbackScreen} 
                   options={{
                    headerTitle:'Feedbacks',
                    headerRight: () => (
                      <Button
                        onPress={logout}
                        title="Logout"
                        color="#000"
                      />
                    ),
                  }} 
                   />
                   <Stack.Screen 
                   name="complains" 
                   component={ComplainScreen} 
                   options={{
                    headerTitle:'Complains',
                    headerRight: () => (
                      <Button
                        onPress={logout}
                        title="Logout"
                        color="#000"
                      />
                    ),
                  }} 
                   />
                   <Stack.Screen 
                   name="managefeedback" 
                   component={ManageFeedbackScreen} 
                   options={{
                    headerTitle:'Manage Feedbacks',
                    headerRight: () => (
                      <Button
                        onPress={logout}
                        title="Logout"
                        color="#000"
                      />
                    ),
                  }} 
                   />
                   <Stack.Screen 
                   name="results" 
                   component={ResultScreen} 
                   options={{
                    headerTitle:'Results',
                    headerRight: () => (
                      <Button
                        onPress={logout}
                        title="Logout"
                        color="#000"
                      />
                    ),
                  }} 
                   />
                   </>
                   
                ) : (
                 
                    <>
                    
                    
               <Stack.Screen 
               name="Login" 
               component={LoginScreen} 
               options={{headerShown: false}} 
               />
               <Stack.Screen 
                    name="Register" 
                    component={RegisterScreen} 
                    options={{headerShown: false}} 
                    />
               </>
               
               
               )}


                
                
            </Stack.Navigator>
        </NavigationContainer>
    );
};

export default Navigation;