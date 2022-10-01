package com.indexPage.AdminIndexPage;

import com.initialization.AbstractPage;
import com.verification.AdminVerification.AdminDashboardVerification;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class AdminDashboardIndexPage extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public AdminDashboardIndexPage(WebDriver driver) {
        super(driver);
    }

    //------------------------Variable Declaration Section--------------------------------------------

    //------------------------Locator's Definition Section--------------------------------------------
    @FindBy(xpath = "//button[@onclick='redirectToManageUsers()']")
    private WebElement manageUsers;

    @FindBy(xpath = "//button[normalize-space()='Manage Booking']")
    private WebElement manageBooking;

    @FindBy(xpath = "//button[normalize-space()='Manage Locations']")
    private WebElement manageLocations;

    @FindBy(xpath = "//button[@id='dropdownMenuButton1']")
    private WebElement userDropdown;

    @FindBy(xpath = "//a[normalize-space()='Edit Profile']")
    private WebElement btnEditProfile;

    @FindBy(xpath = "//a[normalize-space()='Sign Out']")
    private WebElement btnSignOut;

    @FindBy(xpath = "//input[@id='back']")
    private WebElement btnGoBackToDashboard;

    @FindBy(xpath = "(//button[@id='viewEnabled'])[1]")
    private WebElement btnView;

    @FindBy(xpath = "(//button[@id='block'])[1]")
    private WebElement btnBlock;

    @FindBy(xpath = "(//button[normalize-space()='Unblock'])[1]")
    private WebElement btnUnBlock;

    //------------------------Method's Definition Section--------------------------------------------

    public AdminDashboardVerification clickOnManageUsers(){
        log("Step : " +_logStep++ + " Click on Manage Users.");
        highlightElement(driver,manageUsers);
        manageUsers.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnManageBookings(){
        log("Step : " +_logStep++ + " Click on Manage Bookings.");
        highlightElement(driver,manageBooking);
        manageBooking.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnManageLocations(){
        log("Step : " +_logStep++ + " Click on Manage Locations.");
        highlightElement(driver,manageLocations);
        manageLocations.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnUserDropDown(){
        log("Step : " +_logStep++ + " Click on user name DropDown.");
        highlightElement(driver,userDropdown);
        userDropdown.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnEditProfile(){
        log("Step : " +_logStep++ + " Click on Edit Profile.");
        highlightElement(driver,btnEditProfile);
        btnEditProfile.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnSignOut(){
        log("Step : " +_logStep++ + " Click on Sign Out Button.");
        highlightElement(driver,btnSignOut);
        btnSignOut.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnGoToDashboard(){
        log("Step : " +_logStep++ + " Click on Go back to Dashboard Button.");
        highlightElement(driver,btnGoBackToDashboard);
        btnGoBackToDashboard.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnViewButton(){
        log("Step : " +_logStep++ + " Click on View Button.");
        highlightElement(driver,btnView);
        btnView.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnBlockButton(){
        log("Step : " +_logStep++ + " Click on Block Button.");
        highlightElement(driver,btnBlock);
        btnBlock.click();
        return new AdminDashboardVerification(driver);
    }

    public AdminDashboardVerification clickOnUnblockButton(){
        log("Step : " +_logStep++ + " Click on UnBlock Button.");
        highlightElement(driver,btnUnBlock);
        btnUnBlock.click();
        return new AdminDashboardVerification(driver);
    }
}
