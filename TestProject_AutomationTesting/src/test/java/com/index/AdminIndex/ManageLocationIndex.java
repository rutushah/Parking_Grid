package com.index.AdminIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class ManageLocationIndex extends BrowserConfiguration {

    @Test
    public void toVerifyPageTitle(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageLocations_001 :: To verify the page title of Manage Locations Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        log("To verify user can see the Page Title of Manage Locations Page.");
        if (adminDashboardVerification.verifyManageLocationsPageTitle()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyLocationPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageLocations_002 :: To verify admin can see the Manage Location Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        log("Verify user can see the manage location page and all the available locations on Manage Location Page.");
        if (adminDashboardVerification.verifyManageLocationPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyAvailableFloors(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageLocations_003 :: To verify admin can see the available floors of Manage Location Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        adminDashboardIndexPage.clickOnViewButton();

        log("Verify user is redirected to the floors page and see the available floors for the users.");
        if (adminDashboardVerification.verifyAvailableFloors()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

//        adminDashboardIndexPage

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyAdminCanBlockUnblockLocations(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageBookings_004 :: To verify admin can block / unblock the locations.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        adminDashboardIndexPage.clickOnBlockButton();

        log("Verify location is blocked successfully by admin.");
        if (adminDashboardVerification.verifyLocationBlockedSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnUnblockButton();

        log("Verify location is unblocked successfully by admin.");
        if (adminDashboardVerification.verifyLocationUnblockedSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }


    @Test
    public void toVerifyUserRedirectedToDashboardFromManageLocations(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageBookings_005 :: To verify admin is redirected to Dashboard, when admin clicks on Go to Dashboard from Manage Locations Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        log("To verify admin can see elements and the data of the Manage Location Page.");
        if (adminDashboardVerification.verifyManageLocationPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnGoToDashboard();

        log("Verify admin is redirected to Dashboard Page.");
        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
