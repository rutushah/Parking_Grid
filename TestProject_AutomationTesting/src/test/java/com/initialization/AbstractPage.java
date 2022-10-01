package com.initialization;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.PageFactory;
import org.openqa.selenium.support.pagefactory.AjaxElementLocatorFactory;
import org.openqa.selenium.support.pagefactory.ElementLocatorFactory;

public class AbstractPage extends BrowserConfiguration{

    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public AbstractPage(WebDriver driver) {
        this.driver = driver;
        ElementLocatorFactory finder = new AjaxElementLocatorFactory(driver,
                10);
        PageFactory.initElements(finder, this);
    }
}
