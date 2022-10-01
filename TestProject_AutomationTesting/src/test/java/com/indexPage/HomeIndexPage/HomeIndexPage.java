package com.indexPage.HomeIndexPage;

import com.initialization.AbstractPage;
import com.verification.HomeVerification.HomeVerification;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class HomeIndexPage extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public HomeIndexPage(WebDriver driver) {
        super(driver);
    }

    //-----------------------------Variable Declaration Section-------------------------------------

    String _test = "hshsdhsh";

    //----------------------------Locator's Definition Section-------------------------------------
    @FindBy(xpath = "//a[normalize-space()='About us']")
    private WebElement btnAboutUs;

    @FindBy(xpath = "//a[normalize-space()='Contact us']")
    private WebElement btnContactUs;

    @FindBy(xpath = "//button[normalize-space()='Login']")
    private WebElement btnLogin;

    @FindBy(xpath = "//button[normalize-space()='Register']")
    private WebElement btnRegister;


    //-----------------------------Method Declaration Section---------------------------------------

    public HomeVerification clickOnAboutUsButton(){

        log("Step : " +_logStep++ + "Click on About Us Button.");
        highlightElement(driver,btnAboutUs);
        btnAboutUs.click();
        return new HomeVerification(driver);
    }



    public HomeVerification clickOnContactUsButton(){

        log("Step : " +_logStep++ + "Click on Contact Us Button.");
        highlightElement(driver,btnContactUs);
        btnContactUs.click();
        return new HomeVerification(driver);
    }

    public HomeVerification clickOnLoginButton(){

        log("Step : " +_logStep++ + "Click on Login Button.");
        highlightElement(driver,btnLogin);
       // btnLogin.click();c
        clickOnJS(driver,btnLogin);
        pause(1);
        return new HomeVerification(driver);
    }

    public HomeVerification clickOnRegisterButton(){

        log("Step : " +_logStep++ + "Click on Register Button.");
        highlightElement(driver,btnRegister);
        btnRegister.click();
        return new HomeVerification(driver);
    }
}

