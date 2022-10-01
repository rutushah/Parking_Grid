package com.verification.HomeVerification;

import com.initialization.AbstractPage;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.testng.Assert;
import org.testng.asserts.Assertion;

public class HomeVerification extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public HomeVerification(WebDriver driver) {
        super(driver);
    }

    //----------------------Variable Declaration Section---------------------------------

    String _homePageTitle = "Home";
    String _homePageHeaderTitle = "Welcome to ParkingGrid";

    String _selectRoleTitle = "Select Role";

    //----------------------Locators Definition Section--------------------------------------------

    @FindBy(xpath = "//img[@alt='ParkGridLogo']")
    private WebElement logo;

    @FindBy(xpath = "//a[@class='nav-link col px-md-5'][normalize-space()='Home']")
    private WebElement btnHome;

    @FindBy(xpath = "//a[normalize-space()='About us']")
    private WebElement btnAboutUs;

    @FindBy(xpath = "//a[normalize-space()='Contact us']")
    private WebElement btnContactUs;

    @FindBy(xpath = "//button[normalize-space()='Login']")
    private WebElement btnLogin;

    @FindBy(xpath = "//button[normalize-space()='Register']")
    private WebElement btnRegister;

    @FindBy(xpath = "//h1[normalize-space()='Welcome to ParkingGrid']")
    private WebElement lblHeader;
    //----------------------Method Declaration Section-----------------------------------------------

    public boolean verifyHomePageTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_homePageTitle,_actualHomePageTitle);
        return true;
    }


    public boolean verifyHomePageIsVisible(){

        String  _actualHeader = lblHeader.getText();

        Assert.assertEquals(_homePageHeaderTitle, _actualHeader);
        Assert.assertTrue(logo.isDisplayed() && btnHome.isDisplayed() &&
                btnAboutUs.isDisplayed() && btnContactUs.isDisplayed() &&
                btnLogin.isDisplayed() && btnRegister.isDisplayed() == true);

        return true;
    }

    public boolean verifyLogo(){
        Assert.assertTrue(logo.isDisplayed() == true);
        return true;
    }

    public boolean verifyHeaderElementsOnHomePage(){
        Assert.assertTrue(logo.isDisplayed() && btnHome.isDisplayed() &&
                btnAboutUs.isDisplayed() && btnContactUs.isDisplayed());
        return true;
    }

    public boolean verifyUserRedirectedToSelectRole(){
        String _actualTitleForSelectRole = driver.getTitle();
        Assert.assertEquals(_selectRoleTitle,_actualTitleForSelectRole);
        pause(2);
        return true;
    }
}
