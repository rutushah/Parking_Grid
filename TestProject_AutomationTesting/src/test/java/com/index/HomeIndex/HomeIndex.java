package com.index.HomeIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class HomeIndex extends BrowserConfiguration {


    @Test
    public void verifyPageTitle(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_HomePage_001 :: To verify the title of the Home Page");

        if(homeVerification.verifyHomePageTitle()==true){
            log("<b> Test verification status : PASS </b>");
        }else {
           log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifyHomePageIsVisibleOrNot(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        System.out.println("TestCase :: PG_HomePage_002 :: To verify home Page is Visble to the users.");

        if (homeVerification.verifyHomePageIsVisible()){
            System.out.println("<b> Test verification status : PASS </b>");
        }else {
            System.out.println("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyLogoOfParkingGrid(){

        int numOfFailedSteps = 0;
        _logStep = 1;

       log("PG_HomePage_003 :: To verify user can see the \"Logo\" of the Parking Grid on the \"Home Page\"..");

        if (homeVerification.verifyLogo()){
            System.out.println("<b> Test verification status : PASS </b>");
        }else {
            System.out.println("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyTheHeaderElements(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        log("PG_HomePage_004 :: \"To verify user can see the following elements on the \"\"Header\"\" of the \"\"Home Page\"\".\n" +
                "- Logo \n" +
                "- Home Tab \n" +
                "- About us Tab\n" +
                "- Contact us Tab\"");

        if (homeVerification.verifyHeaderElementsOnHomePage()){
            System.out.println("<b> Test verification status : PASS </b>");
        }else {
            System.out.println("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifyTheElementsOfHomePage(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        log("PG_HomePage_005 ::  \"To verify user can see the following elements on the \"\"Home Page\"\".\n" +
                "- Logo \n" +
                "- Home Tab\n" +
                "- About us Tab\n" +
                "- Contact us Tab\n" +
                "- Login Button.\n" +
                "- Register Button.\n" +
                "- Footer\"");

        if (homeVerification.verifyHomePageIsVisible()){
            System.out.println("<b> Test verification status : PASS </b>");
        }else {
            System.out.println("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifySelectRoleRedirectionFromAboutUsPage(){
        int numOfFailedSteps = 0;
        _logStep =1;

        log("PG_HomePage_006 :: To verify user is redirected to Select Role page when user clicks on About us button from header.");

        homeIndexPage.clickOnAboutUsButton();

        log("Verify user is redirected to Select Role Page, on click of About us button.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void verifySelectRolePageRedirectionFromContactUsPage(){

        int numOfFailedSteps = 0;
        _logStep++;

        log("PG_HomePage_007 :: To verify user is redirected to \"Select Role\" page when user clicks on \"Contact us\" button from header.");

        homeIndexPage.clickOnContactUsButton();

      log("Verify user is redirected to Select Role Page, on click of Contact us button.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifySelectRolePageRedirectionFromLoginPage(){

        int numOfFailedSteps = 0;
        _logStep++;

        log("PG_HomePage_008 :: To verify user is redirected to \"Select Role\" page when user clicks on \"Login\" button from header.");

        homeIndexPage.clickOnLoginButton();

        System.out.println("Verify user is redirected to Select Role Page, on click of Login button.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifySelectRolePageRedirectionFromRegisterPage(){

        int numOfFailedSteps = 0;
        _logStep++;

        log("PG_HomePage_009 :: To verify user is redirected to \"Select Role\" page when user clicks on \"Register\" button from header.");

        homeIndexPage.clickOnRegisterButton();

        log("Verify user is redirected to Select Role Page, on click of Register button.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
